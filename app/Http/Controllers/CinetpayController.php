<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\CinetPay;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CinetpayController extends Controller
{
    public function modification(){
        return view('cinet_notification');
    }


    public function retour(){
        return view('cinet_return');
    }

    public function initialisation(){
        $response = [];
        $montant_a_payer = 25000;
        $trx_rf = Str::random(15);
        $apiKey = env('CINET_API_KEY'); // Remplacez ce champs par votre APIKEY
        $site_id = env('CINET_SITE_ID'); // Remplacez ce champs par votre SiteID
        $description_du_paiement = sprintf('paiement de reference %s', $trx_rf); // Description du Payment
        $date_transaction = date("Y-m-d H:i:s"); // Date Paiement dans votre système
        $identifiant_du_payeur = Session::get('email'); // Mettez ici une information qui vous permettra d'identifier de façon unique le payeur
        $formName = "goCinetPay"; // nom du formulaire CinetPay
        $notify_url = route('cinet-notify'); // Lien de notification CallBack CinetPay (IPN Link)
        $return_url = route('cinet-return'); // Lien de retour CallBack CinetPay
        $cancel_url = route('cinet-cancel');

        // Configuration du bouton
        $btnType = 2;//1-5xwxxw
        $btnSize = 'large'; // 'small' pour reduire la taille du bouton, 'large' pour une taille moyenne ou 'larger' pour  une taille plus grande


        // Paramétrage du panier CinetPay et affichage du formulaire
        try {
            $cp = new CinetPay($site_id, $apiKey);
            $cp->setTransId($trx_rf)
                ->setDesignation($description_du_paiement)
                ->setTransDate($date_transaction)
                ->setAmount($montant_a_payer)
                ->setDebug(false)// Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
                ->setCustom($identifiant_du_payeur)// optional
                ->setNotifyUrl($notify_url)// optional
                ->setReturnUrl($notify_url)// optional
                ->setCancelUrl($cancel_url);

            $response['form'] = $cp->getPayButton($formName, $btnType, $btnSize);
            $response['message']='ok';
            $response['status'] = true;
        }
        catch (\Exception $e) {
            $response['message'] = $e->getMessage();
            $response['status'] = false;
        }

        return response()->json($response);
    }

    public function cancel(Request $request){

    }
}
