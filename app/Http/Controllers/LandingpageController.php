<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LandingpageController extends Controller
{
    public function index()
    {
        $filtered = [];
        $products = Produk::all();

        try {
            $reviews = Review::all();

            if ($reviews->isEmpty()) {
                return view('index', compact('products', 'filtered'));
            }

            foreach ($reviews as $review) {
                try {
                    $response = Http::withOptions([
                        'verify' => false // <-- ini untuk abaikan validasi SSL
                    ])->withHeaders([
                        'Accept' => 'application/json',
                        'Content-Type' => 'application/json'
                    ])->post('https://127.0.0.1:5000/predict', [
                        'komentar' => $review->komentar
                    ]);

                    if (!$response->successful()) {
                        Log::error("Gagal akses Flask API untuk komentar ID {$review->id}. Status: " . $response->status() . " - " . $response->body());
                        continue;
                    }

                    $result = $response->json();

                    if (
                        isset($result['prediksi_sentimen']) &&
                        $result['prediksi_sentimen'] === 'POSITIF'
                    ) {
                        $filtered[] = [
                            'id' => $review->id,
                            'komentar' => $review->komentar,
                            'komentar_clean' => $result['komentar_clean'] ?? '',
                            'created_at' => $review->created_at,
                        ];
                    }
                } catch (\Exception $innerEx) {
                    Log::error("Error saat memproses review ID {$review->id}: " . $innerEx->getMessage());
                    continue;
                }
            }
        } catch (\Exception $e) {
            Log::error("Terjadi kesalahan saat filterReview: " . $e->getMessage());
        }

        return view('index', compact('products', 'filtered'));
    }
}
