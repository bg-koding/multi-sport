<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('admin.produk.index', [
            'list_produk' => Produk::all()
        ]);
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required',
            'kategori_produk' => 'required',
            'gambar_produk' => 'required',
            'deskripsi_produk' => 'required',
        ]);

        $produk = new Produk();
        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->stok_produk = $request->stok_produk;
        $produk->kategori_produk = $request->kategori_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;
        $files = [];
        if ($request->hasFile('gambar_produk')) {
            foreach ($request->file('gambar_produk') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('gambar', $name);
                $files[] = $name;
            }
        }
        $produk->gambar_produk = json_encode($files);

        // Bola

        if ($request->size_bola) {
            $size_bola = [];
            foreach ($request->size_bola as $size_bola2) {
                $size_bola[] = $size_bola2;
            }
            $size_bola = array_filter($size_bola, function ($value) {
                return $value !== null;
            });
            $produk->size_bola = json_encode($size_bola);
        }


        if ($request->warna_bola) {
            $warna_bola = [];
            foreach ($request->warna_bola as $warna_bola2) {
                $warna_bola[] = $warna_bola2;
            }
            $warna_bola = array_filter($warna_bola, function ($value) {
                return $value !== null;
            });
            $produk->warna_bola = json_encode($warna_bola);
        }


        if ($request->tipe_bola) {
            $tipe_bola = [];
            foreach ($request->tipe_bola as $tipe_bola2) {
                $tipe_bola[] = $tipe_bola2;
            }
            $tipe_bola = array_filter($tipe_bola, function ($value) {
                return $value !== null;
            });
            $produk->tipe_bola = json_encode($tipe_bola);
        }


        // Baju

        if ($request->size_baju) {
            $size_baju = [];
            foreach ($request->size_baju as $size_baju2) {
                $size_baju[] = $size_baju2;
            }
            $size_baju = array_filter($size_baju, function ($value) {
                return $value !== null;
            });
            $produk->size_baju = json_encode($size_baju);
        }

        if ($request->warna_baju) {
            $warna_baju = [];
            foreach ($request->warna_baju as $warna_baju2) {
                $warna_baju[] = $warna_baju2;
            }
            $warna_baju = array_filter($warna_baju, function ($value) {
                return $value !== null;
            });
            $produk->warna_baju = json_encode($warna_baju);
        }


        // sepatu

        if ($request->size_sepatu) {
            $size_sepatu = [];
            foreach ($request->size_sepatu as $size_sepatu2) {
                $size_sepatu[] = $size_sepatu2;
            }
            $size_sepatu = array_filter($size_sepatu, function ($value) {
                return $value !== null;
            });
            $produk->size_sepatu = json_encode($size_sepatu);
        }

        if ($request->warna_sepatu) {
            $warna_sepatu = [];
            foreach ($request->warna_sepatu as $warna_sepatu2) {
                $warna_sepatu[] = $warna_sepatu2;
            }
            $warna_sepatu = array_filter($warna_sepatu, function ($value) {
                return $value !== null;
            });
            $produk->warna_sepatu = json_encode($warna_sepatu);
        }

        $produk->save();


        return redirect('admin/produk');
    }

    public function show(Produk $produk)
    {
        return view('admin.produk.show', [
            'produk' => $produk,
            'foto_produk' => json_decode($produk->gambar_produk),
            'size_bola' => json_decode($produk->size_bola),
            'warna_bola' => json_decode($produk->warna_bola),
            'tipe_bola' => json_decode($produk->tipe_bola),
            'size_baju' => json_decode($produk->size_baju),
            'warna_baju' => json_decode($produk->warna_baju),
            'size_sepatu' => json_decode($produk->size_sepatu),
            'warna_sepatu' => json_decode($produk->warna_sepatu),
        ]);
    }
    public function edit(Produk $produk)
    {
        return view('admin.produk.edit', [
            'produk' => $produk
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'harga_produk' => 'required',
            'stok_produk' => 'required',
            'kategori_produk' => 'required',
            'deskripsi_produk' => 'required',
        ]);

        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->stok_produk = $request->stok_produk;
        $produk->kategori_produk = $request->kategori_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;

        if ($request->hasFile('gambar_produk')) {
            $files = [];

            // delete file
            $file = json_decode($produk->gambar_produk);
            $lenght = count($file);

            for ($i = 0; $i < $lenght; $i++) {
                unlink(public_path("gambar/" . $file[$i]));
            };

            // upload file

            foreach ($request->file('gambar_produk') as $file) {
                $name = time() . rand(1, 100) . '.' . $file->extension();
                $file->storeAs('gambar', $name);
                $files[] = $name;
            }
            $produk->gambar_produk = json_encode($files);
        }


        // Bola

        if ($request->size_bola) {
            $size_bola = [];
            foreach ($request->size_bola as $size_bola2) {
                $size_bola[] = $size_bola2;
            }
            $size_bola = array_filter($size_bola, function ($value) {
                return $value !== null;
            });
            $produk->size_bola = json_encode($size_bola);
        }


        if ($request->warna_bola) {
            $warna_bola = [];
            foreach ($request->warna_bola as $warna_bola2) {
                $warna_bola[] = $warna_bola2;
            }
            $warna_bola = array_filter($warna_bola, function ($value) {
                return $value !== null;
            });
            $produk->warna_bola = json_encode($warna_bola);
        }


        if ($request->tipe_bola) {
            $tipe_bola = [];
            foreach ($request->tipe_bola as $tipe_bola2) {
                $tipe_bola[] = $tipe_bola2;
            }
            $tipe_bola = array_filter($tipe_bola, function ($value) {
                return $value !== null;
            });
            $produk->tipe_bola = json_encode($tipe_bola);
        }


        // Baju

        if ($request->size_baju) {
            $size_baju = [];
            foreach ($request->size_baju as $size_baju2) {
                $size_baju[] = $size_baju2;
            }
            $size_baju = array_filter($size_baju, function ($value) {
                return $value !== null;
            });
            $produk->size_baju = json_encode($size_baju);
        }

        if ($request->warna_baju) {
            $warna_baju = [];
            foreach ($request->warna_baju as $warna_baju2) {
                $warna_baju[] = $warna_baju2;
            }
            $warna_baju = array_filter($warna_baju, function ($value) {
                return $value !== null;
            });
            $produk->warna_baju = json_encode($warna_baju);
        }


        // sepatu

        if ($request->size_sepatu) {
            $size_sepatu = [];
            foreach ($request->size_sepatu as $size_sepatu2) {
                $size_sepatu[] = $size_sepatu2;
            }
            $size_sepatu = array_filter($size_sepatu, function ($value) {
                return $value !== null;
            });
            $produk->size_sepatu = json_encode($size_sepatu);
        }

        if ($request->warna_sepatu) {
            $warna_sepatu = [];
            foreach ($request->warna_sepatu as $warna_sepatu2) {
                $warna_sepatu[] = $warna_sepatu2;
            }
            $warna_sepatu = array_filter($warna_sepatu, function ($value) {
                return $value !== null;
            });
            $produk->warna_sepatu = json_encode($warna_sepatu);
        }

        $produk->save();

        return redirect('admin/produk');
    }

    public function destroy(Produk $produk)
    {
        // delete file
        $file = json_decode($produk->gambar_produk);
        $lenght = count($file);

        for ($i = 0; $i < $lenght; $i++) {
            unlink(public_path("gambar/" . $file[$i]));
        };

        $produk->delete();

        return redirect('admin/produk');
    }
}
