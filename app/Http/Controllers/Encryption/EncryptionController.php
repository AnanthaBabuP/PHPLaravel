<?php

namespace App\Http\Controllers\Encryption;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EncryptionController extends Controller
{
    public function encrypt(Request $request)
    {
        $dataToEncrypt = $request->input('data');
        $encryptedData = Crypt::encrypt($dataToEncrypt);

        return "Encrypted Data: " . $encryptedData;
    }

    public function decrypt(Request $request)
    {
        $encryptedData = $request->input('encrypted_data');
        $decryptedData = Crypt::decrypt($encryptedData);

        return "Decrypted Data: " . $decryptedData;
    }
}
