<?php

namespace App\Http\Controllers;

use App\Mail\x047bfee3c;
use App\Models\{xe903ab0c1, xc6aeb9a43};
use App\Models\xab9f2e63d;
use App\Models\xcb5117899;
use App\Models\x8a35b0636;
use App\Models\xf8264b502;
use App\Models\x644b3ca09;
use App\Models\x452f3f41d;
use App\Models\xf4734f2a4;
use App\Models\x041933e05;
use App\Models\xb52f67a71;
use App\Utility\xc11176996;
use App\Utility\x484697e3e;
use x29c2348b1;
use xb49d53275;
use Illuminate\Http\x5c4da68fe;
use Illuminate\Support\Facades\x84187e429;
use Maatwebsite\Excel\Facades\x3b37e364d;
use xbba42f341;
class x4aaff933b extends x2a9c7f9fd
{
    public function __construct()
    {
        // Staff Permission Check
        $this->x3b5f7db75(["\x70\145\162\155\x69\x73\x73\x69\x6f\156\x3a\x76\151\x65\x77\137\141\154\x6c\137\157\162\x64\x65\162\x73\174\166\151\145\x77\137\x69\156\x68\x6f\x75\x73\x65\137\157\162\144\145\x72\163\174\166\x69\x65\x77\x5f\163\145\x6c\x6c\x65\x72\137\x6f\x72\144\x65\x72\x73\x7c\166\151\x65\167\x5f\160\x69\143\153\165\160\x5f\160\157\151\x6e\x74\x5f\157\x72\x64\x65\x72\x73"])->only("\141\154\154\x5f\x6f\x72\144\x65\162\163");
        $this->x3b5f7db75(["\160\145\x72\155\151\163\x73\151\157\156\72\166\x69\x65\x77\137\157\x72\144\145\x72\137\144\145\x74\141\151\x6c\163"])->only("\163\150\157\x77");
        $this->x3b5f7db75(["\160\145\x72\155\151\x73\163\x69\x6f\156\72\144\145\154\x65\164\x65\x5f\157\x72\144\145\x72"])->only("\144\x65\163\x74\x72\157\x79", "\x62\x75\154\153\x5f\157\162\144\145\x72\137\x64\145\x6c\145\x74\145");
    }
    // All Orders
    public function x066c1caa9(x648d3cf04 $x3260fd339)
    {
        goto xf9b160d1a;
        xc23e18968:
        if (!($xe6c2732f8->delivery_status != null)) {
            goto x8d82211b7;
        }
        $x3b0d2f104 = $x3b0d2f104->where("\x64\145\x6c\x69\x76\x65\x72\x79\137\x73\164\x61\164\165\x73", $xe6c2732f8->delivery_status);
        $xbf0d21070 = $xe6c2732f8->delivery_status;
        x8d82211b7:
        if (!($x947ba305b != null)) {
            goto xdd9dc52b7;
        }
        $x3b0d2f104 = $x3b0d2f104->where("\x63\x72\x65\141\164\x65\144\137\x61\x74", "\x3e\75", date("\131\x2d\x6d\x2d\x64", strtotime(explode("\x20\164\x6f\40", $x947ba305b)[0])) . "\x20\x20\60\60\72\60\x30\x3a\60\60")->where("\x63\x72\145\141\164\145\x64\137\x61\x74", "\x3c\x3d", date("\131\x2d\x6d\x2d\x64", strtotime(explode("\x20\x74\157\40", $x947ba305b)[1])) . "\40\x20\x32\x33\72\x35\x39\72\65\71");
        xdd9dc52b7:
        $x3b0d2f104 = $x3b0d2f104->xf3819f824(15);
        return xcc04b623b("\142\x61\143\x6b\x65\156\x64\56\x73\x61\x6c\x65\x73\56\151\x6e\x64\x65\170", compact("\157\x72\144\145\x72\x73", "\x73\x6f\x72\164\x5f\x73\x65\141\162\143\x68", "\160\x61\x79\x6d\x65\156\x74\137\x73\164\141\164\x75\163", "\144\x65\154\x69\166\x65\x72\171\137\x73\x74\141\x74\x75\x73", "\x64\141\x74\x65"));
        goto xd3744a9c5;
        xf9b160d1a:
        x358a603ec::xfd85222de();
        $x947ba305b = $xe6c2732f8->date;
        $xa9488e422 = null;
        $xbf0d21070 = null;
        $x15afdee34 = "\x0";
        $x3b0d2f104 = xfdd8353ea::x5b15d5585("\151\144", "\144\x65\x73\143");
        $x7439b97c8 = x2e61020a6::where("\165\163\145\x72\137\164\x79\160\x65", "\x61\144\155\x69\x6e")->first()->id;
        if (xd809e2941::x752950bc7() == "\151\156\x68\157\x75\163\145\x5f\x6f\162\144\145\162\163\56\151\x6e\x64\145\170" && x86671cc44::x2728c96cc()->xd7eff6af0("\x76\x69\x65\167\137\x69\x6e\x68\157\x75\x73\x65\x5f\x6f\x72\144\145\x72\x73")) {
            goto xa4d492f8b;
        }
        if (xd809e2941::x752950bc7() == "\163\145\x6c\154\145\x72\x5f\x6f\162\144\x65\162\163\56\x69\x6e\144\145\x78" && x86671cc44::x2728c96cc()->xd7eff6af0("\x76\x69\145\167\x5f\x73\145\154\x6c\145\162\137\x6f\x72\144\x65\162\163")) {
            goto x9c59df8ec;
        }
        if (xd809e2941::x752950bc7() == "\x70\151\143\153\137\x75\x70\137\160\157\151\x6e\164\56\x69\x6e\x64\x65\170" && x86671cc44::x2728c96cc()->xd7eff6af0("\166\x69\x65\167\137\160\x69\143\153\165\160\x5f\160\x6f\151\x6e\x74\x5f\x6f\162\x64\145\162\163")) {
            goto x03376d7c0;
        }
        if (xd809e2941::x752950bc7() == "\141\154\x6c\x5f\157\x72\x64\x65\162\x73\x2e\x69\156\144\x65\x78" && x86671cc44::x2728c96cc()->xd7eff6af0("\166\151\145\x77\x5f\141\154\x6c\x5f\157\x72\144\145\162\163")) {
            goto x97ad28440;
        }
        goto x19a745ca3;
        xa4d492f8b:
        $x3b0d2f104 = $x3b0d2f104->where("\x6f\162\144\145\162\163\56\x73\x65\154\154\145\x72\137\151\x64", "\x3d", $x7439b97c8);
        goto x19a745ca3;
        x9c59df8ec:
        $x3b0d2f104 = $x3b0d2f104->where("\x6f\x72\x64\x65\x72\x73\56\163\145\154\154\145\x72\x5f\x69\144", "\41\75", $x7439b97c8);
        goto x19a745ca3;
        x03376d7c0:
        if (!(xe97fa64e5("\x76\145\x6e\144\157\162\137\163\171\x73\164\145\x6d\x5f\141\x63\x74\x69\166\141\164\x69\x6f\x6e") != 1)) {
            goto x9f5409dda;
        }
        goto xf2249b614;
        xf2249b614:
        $x3b0d2f104 = $x3b0d2f104->where("\x6f\162\144\x65\x72\x73\x2e\163\x65\154\154\145\162\x5f\x69\x64", "\75", $x7439b97c8);
        x9f5409dda:
        $x3b0d2f104->where("\x73\x68\x69\160\160\x69\x6e\147\137\164\171\x70\145", "\x70\x69\x63\153\165\160\137\160\157\x69\156\x74")->x5b15d5585("\143\157\144\145", "\x64\145\x73\143");
        if (!(x86671cc44::x2728c96cc()->user_type == "\x73\x74\141\x66\x66" && x86671cc44::x2728c96cc()->staff->pick_up_point != null)) {
            goto x1005e0371;
        }
        $x3b0d2f104->where("\163\150\151\x70\160\x69\x6e\147\137\164\171\x70\x65", "\160\151\x63\153\x75\160\x5f\x70\157\151\x6e\x74")->where("\160\x69\143\x6b\165\160\x5f\160\x6f\151\x6e\x74\x5f\x69\x64", x86671cc44::x2728c96cc()->staff->pick_up_point->id);
        x1005e0371:
        goto x19a745ca3;
        x97ad28440:
        if (!(xe97fa64e5("\166\145\156\x64\x6f\x72\137\x73\171\163\x74\x65\x6d\x5f\141\143\x74\x69\x76\x61\164\x69\x6f\x6e") != 1)) {
            goto x91d5e0acc;
        }
        $x3b0d2f104 = $x3b0d2f104->where("\157\x72\x64\x65\162\163\56\163\145\x6c\x6c\x65\x72\137\151\x64", "\x3d", $x7439b97c8);
        x91d5e0acc:
        x19a745ca3:
        if (!$xe6c2732f8->search) {
            goto xe63055259;
        }
        $xa9488e422 = $xe6c2732f8->search;
        $x3b0d2f104 = $x3b0d2f104->where("\143\x6f\x64\x65", "\x6c\151\153\x65", "\45" . $xa9488e422 . "\45");
        xe63055259:
        if (!($xe6c2732f8->payment_status != null)) {
            goto xf4b1cf2c3;
        }
        $x3b0d2f104 = $x3b0d2f104->where("\x70\141\x79\x6d\x65\x6e\x74\137\163\x74\x61\x74\x75\163", $xe6c2732f8->payment_status);
        $x15afdee34 = $xe6c2732f8->payment_status;
        xf4b1cf2c3:
        goto xc23e18968;
        xd3744a9c5:
    }
    public function xeddd4155f($x9c3611504)
    {
        $x7cb415596 = xfdd8353ea::x8231635b0(x993e31aa2($x0fd3a7611));
        $x0a497b3a5 = json_decode($x7cb415596->shipping_address);
        $xa4c4c37cd = x2e61020a6::where("\x63\151\x74\171", $x0a497b3a5->city)->where("\x75\163\x65\x72\137\164\x79\x70\x65", "\x64\x65\154\151\x76\x65\x72\x79\137\142\x6f\x79")->get();
        $x7cb415596->viewed = 1;
        $x7cb415596->save();
        return xcc04b623b("\142\x61\x63\x6b\145\156\144\56\163\141\x6c\x65\x73\x2e\163\x68\157\167", compact("\x6f\x72\144\145\x72", "\x64\145\x6c\x69\x76\x65\162\x79\x5f\x62\157\171\163"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function x5bbce9c68(x648d3cf04 $x3260fd339)
    {
        $x8342385c0 = xf66e50176::where("\x75\x73\x65\162\137\x69\144", x86671cc44::x2728c96cc()->id)->x8fb59e00e()->get();
        if (!$x8342385c0->isEmpty()) {
            goto xa65e4391f;
        }
        xa3e4373b1(x919f49a6c("\x59\x6f\x75\x72\x20\x63\141\162\x74\40\151\x73\x20\x65\x6d\160\164\x79"))->x2045ba3a9();
        return x707f97ad5()->x22a5d19c6("\150\157\x6d\145");
        xa65e4391f:
        $x906f11441 = xc00e95504::where("\151\144", $x8342385c0[0]["\141\x64\144\162\x65\x73\163\x5f\151\144"])->first();
        $x491fb224b = [];
        if (!($x906f11441 != null)) {
            goto xf7affa103;
        }
        $x491fb224b["\156\141\x6d\x65"] = x86671cc44::x2728c96cc()->name;
        $x491fb224b["\x65\155\141\151\x6c"] = x86671cc44::x2728c96cc()->email;
        $x491fb224b["\141\x64\x64\162\x65\x73\x73"] = $x906f11441->address;
        $x491fb224b["\x63\x6f\165\x6e\164\162\x79"] = $x906f11441->country->name;
        $x491fb224b["\x73\164\141\x74\x65"] = $x906f11441->state->name;
        $x491fb224b["\143\x69\164\171"] = $x906f11441->city->name;
        $x491fb224b["\160\x6f\163\164\141\x6c\x5f\x63\157\144\145"] = $x906f11441->postal_code;
        $x491fb224b["\x70\x68\x6f\x6e\x65"] = $x906f11441->phone;
        $x491fb224b["\x73\150\x69\160\x70\151\156\x67"] = $x906f11441->shipping;
        $x491fb224b["\x63\x6f\165\x72\151\x65\x72"] = $x906f11441->courier;
        // $shippingAddress['instruction'] = $address->instruction;
        if (!($x906f11441->latitude || $x906f11441->longitude)) {
            goto x16ded312c;
        }
        $x491fb224b["\154\x61\164\x5f\x6c\x61\x6e\147"] = $x906f11441->latitude . "\x2c" . $x906f11441->longitude;
        x16ded312c:
        xf7affa103:
        $x44c06cc51 = new xcce83041d();
        $x44c06cc51->user_id = x86671cc44::x2728c96cc()->id;
        $x44c06cc51->shipping_address = json_encode($x491fb224b);
        $x44c06cc51->save();
        $x2fac0a3fd = [];
        foreach ($x8342385c0 as $xdcff72a4d) {
            $x9abb3a173 = [];
            $x11bc42ac4 = x1fa1c585e::find($xdcff72a4d["\160\x72\157\144\x75\x63\164\137\151\x64"]);
            if (!isset($x2fac0a3fd[$x11bc42ac4->user_id])) {
                goto x992d1eead;
            }
            $x9abb3a173 = $x2fac0a3fd[$x11bc42ac4->user_id];
            x992d1eead:
            array_push($x9abb3a173, $xdcff72a4d);
            $x2fac0a3fd[$x11bc42ac4->user_id] = $x9abb3a173;
            x6b27b52d9:
        }
        x8a65a2210:
        foreach ($x2fac0a3fd as $x951247387) {
            $x7cb415596 = new xfdd8353ea();
            $x7cb415596->combined_order_id = $x44c06cc51->id;
            $x7cb415596->user_id = x86671cc44::x2728c96cc()->id;
            $x7cb415596->shipping_address = $x44c06cc51->shipping_address;
            $x7cb415596->additional_info = $xe6c2732f8->additional_info;
            $x7cb415596->payment_type = $xe6c2732f8->payment_option;
            $x7cb415596->delivery_viewed = "\60";
            $x7cb415596->payment_status_viewed = "\60";
            $x7cb415596->code = date("\131\155\x64\55\110\x69\163") . rand(10, 99);
            $x7cb415596->date = strtotime("\x6e\157\x77");
            $x7cb415596->save();
            $x5059dbc8d = 0;
            $xc90c27510 = 0;
            $x754eb993c = 0;
            $x0d068878d = 0;
            $x7b98d25e9 = 0;
            //Order Details Storing
            foreach ($x951247387 as $xdcff72a4d) {
                goto xbdc3ea61f;
                xbdc3ea61f:
                $x11bc42ac4 = x1fa1c585e::find($xdcff72a4d["\x70\162\x6f\144\x75\x63\x74\x5f\151\x64"]);
                $x5059dbc8d += x715ce61bf($xdcff72a4d, $x11bc42ac4, false, false) * $xdcff72a4d["\161\x75\141\x6e\164\x69\x74\171"];
                $xc90c27510 += x45891ae53($xdcff72a4d, $x11bc42ac4, false) * $xdcff72a4d["\x71\165\x61\x6e\164\151\164\171"];
                $x754eb993c += $xdcff72a4d->selling_price * $xdcff72a4d["\161\x75\141\156\x74\x69\164\x79"];
                $x7b98d25e9 += $xdcff72a4d["\x64\x69\x73\143\x6f\165\156\x74"];
                $x151265afc = $xdcff72a4d["\166\141\162\151\141\164\x69\x6f\x6e"];
                $x5d99e3408 = $x11bc42ac4->stocks->where("\x76\x61\162\x69\x61\156\x74", $x151265afc)->first();
                if ($x11bc42ac4->digital != 1 && $xdcff72a4d["\x71\165\141\156\164\151\164\x79"] > $x5d99e3408->qty) {
                    goto xafc746d55;
                }
                if ($x11bc42ac4->digital != 1) {
                    goto x1ef982e7c;
                }
                goto xcc7ff1403;
                xafc746d55:
                xa3e4373b1(x919f49a6c("\x54\150\145\x20\162\x65\x71\x75\x65\163\x74\x65\144\x20\161\x75\141\x6e\164\x69\x74\x79\x20\151\163\x20\156\x6f\164\40\x61\166\x61\151\x6c\141\142\x6c\145\40\146\x6f\162\x20") . $x11bc42ac4->xfc16f90cc("\x6e\x61\155\x65"))->x2045ba3a9();
                $x7cb415596->delete();
                return x707f97ad5()->x22a5d19c6("\143\x61\162\164")->send();
                goto xcc7ff1403;
                x1ef982e7c:
                $x5d99e3408->qty -= $xdcff72a4d["\x71\165\x61\156\x74\151\164\171"];
                $x5d99e3408->save();
                xcc7ff1403:
                $x25f8f1b7a = new x5d2c9bf04();
                goto x507f7d7e8;
                x7e5e744ec:
                if (!($xdcff72a4d["\x73\150\x69\160\160\151\x6e\x67\137\164\x79\160\x65"] == "\160\x69\x63\x6b\x75\x70\x5f\160\157\x69\x6e\164")) {
                    goto x7d48a1a97;
                }
                $x7cb415596->pickup_point_id = $xdcff72a4d["\x70\x69\x63\x6b\165\x70\137\x70\x6f\x69\156\x74"];
                x7d48a1a97:
                if (!($xdcff72a4d["\x73\x68\x69\x70\x70\151\x6e\147\137\164\x79\160\145"] == "\143\141\162\162\x69\145\x72")) {
                    goto x3dab46b6e;
                }
                $x7cb415596->carrier_id = $xdcff72a4d["\143\x61\162\x72\151\145\x72\137\151\x64"];
                x3dab46b6e:
                if (!($x11bc42ac4->added_by == "\x73\145\x6c\x6c\145\x72" && $x11bc42ac4->user->seller != null)) {
                    goto xdbcac07f7;
                }
                $x405de0a62 = $x11bc42ac4->user->seller;
                $x405de0a62->num_of_sale += $xdcff72a4d["\x71\x75\x61\156\x74\x69\x74\171"];
                $x405de0a62->save();
                xdbcac07f7:
                if (!xa3ef35575("\x61\146\146\x69\x6c\151\141\x74\x65\x5f\x73\171\163\164\x65\155")) {
                    goto x68159e1b0;
                }
                if (!$x25f8f1b7a->product_referral_code) {
                    goto x3324b9ccb;
                }
                $xab8092090 = x2e61020a6::where("\162\145\x66\x65\162\162\141\154\137\143\x6f\144\x65", $x25f8f1b7a->product_referral_code)->first();
                $xe796cd1b1 = new x1e8f41692();
                $xe796cd1b1->xe30b5cf25($xab8092090->id, 0, $x25f8f1b7a->quantity, 0, 0);
                x3324b9ccb:
                x68159e1b0:
                x4efb24733:
                goto x9f8200d5c;
                x507f7d7e8:
                $x25f8f1b7a->order_id = $x7cb415596->id;
                $x25f8f1b7a->seller_id = $x11bc42ac4->user_id;
                $x25f8f1b7a->product_id = $x11bc42ac4->id;
                $x25f8f1b7a->variation = $x151265afc;
                $x25f8f1b7a->price = x715ce61bf($xdcff72a4d, $x11bc42ac4, false, false) * $xdcff72a4d["\x71\x75\x61\156\164\x69\x74\171"];
                $x25f8f1b7a->selling_price = $xdcff72a4d["\160\162\151\143\145"] * $xdcff72a4d["\161\165\x61\156\164\151\164\171"];
                $x25f8f1b7a->tax = x45891ae53($xdcff72a4d, $x11bc42ac4, false) * $xdcff72a4d["\161\165\x61\156\164\151\x74\x79"];
                $x25f8f1b7a->shipping_type = $xdcff72a4d["\x73\150\x69\x70\160\x69\x6e\147\137\x74\x79\x70\145"];
                $x25f8f1b7a->product_referral_code = $xdcff72a4d["\160\162\x6f\144\x75\143\164\x5f\x72\145\146\x65\162\162\x61\154\137\143\157\144\x65"];
                $x25f8f1b7a->shipping_cost = $xdcff72a4d["\163\x68\151\160\x70\151\156\x67\137\143\x6f\163\x74"];
                $x0d068878d += $x25f8f1b7a->shipping_cost;
                //End of storing shipping cost
                $x25f8f1b7a->quantity = $xdcff72a4d["\161\x75\141\156\164\151\x74\x79"];
                if (!xa3ef35575("\143\x6c\165\142\x5f\160\157\151\156\164")) {
                    goto xddefbb776;
                }
                $x25f8f1b7a->earn_point = $x11bc42ac4->earn_point;
                xddefbb776:
                $x25f8f1b7a->save();
                $x11bc42ac4->num_of_sale += $xdcff72a4d["\161\x75\141\x6e\164\x69\164\171"];
                $x11bc42ac4->save();
                $x7cb415596->seller_id = $x11bc42ac4->user_id;
                $x7cb415596->shipping_type = $xdcff72a4d["\163\150\x69\160\x70\151\x6e\147\137\x74\x79\160\145"];
                goto x7e5e744ec;
                x9f8200d5c:
            }
            x9bc94585b:
            $x7cb415596->grand_total = $x5059dbc8d + $xc90c27510 + $x0d068878d;
            if (!($x951247387[0]->coupon_code != null)) {
                goto x2baf4f8fa;
            }
            $x7cb415596->coupon_discount = $x7b98d25e9;
            $x7cb415596->grand_total -= $x7b98d25e9;
            $xf0a136579 = new x8000908ef();
            $xf0a136579->user_id = x86671cc44::x2728c96cc()->id;
            $xf0a136579->coupon_id = xc00ddd263::where("\143\157\144\145", $x951247387[0]->coupon_code)->first()->id;
            $xf0a136579->save();
            x2baf4f8fa:
            $x44c06cc51->grand_total += $x7cb415596->grand_total;
            $x7cb415596->selling_total = $x754eb993c;
            $x7cb415596->save();
            xe3ec8d364:
        }
        x98c4ae4a4:
        $x44c06cc51->save();
        $xe6c2732f8->x5a33c631f()->put("\x63\x6f\x6d\142\151\x6e\145\144\x5f\x6f\x72\144\145\x72\137\151\144", $x44c06cc51->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function xa53bb6ffd($x9c3611504)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(x648d3cf04 $x3260fd339, $x9c3611504)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($x9c3611504)
    {
        $x7cb415596 = xfdd8353ea::x8231635b0($x0fd3a7611);
        if ($x7cb415596 != null) {
            goto x5521116c8;
        }
        xa3e4373b1(x919f49a6c("\x53\157\x6d\145\164\150\151\x6e\x67\40\167\145\x6e\x74\x20\167\162\157\156\x67"))->error();
        goto x6eb5e9c21;
        x5521116c8:
        $x7cb415596->xcb670aa87()->delete();
        foreach ($x7cb415596->orderDetails as $x081e021ee => $x6f39010db) {
            try {
                x02ede2a27($x6f39010db);
            } catch (Exception $xcc5381189) {
            }
            $x6f39010db->delete();
            x9b098253a:
        }
        xab7ef15bf:
        $x7cb415596->delete();
        xa3e4373b1(x919f49a6c("\117\162\x64\x65\162\x20\x68\x61\x73\40\x62\145\x65\x6e\40\144\145\154\x65\x74\x65\x64\40\x73\x75\x63\x63\x65\163\x73\x66\165\x6c\x6c\x79"))->x0ec9b202e();
        x6eb5e9c21:
        return x54c158836();
    }
    public function xeb6f58cf4(x648d3cf04 $x3260fd339)
    {
        if (!$xe6c2732f8->id) {
            goto x6b3bad17b;
        }
        foreach ($xe6c2732f8->id as $xbd2907eac) {
            $this->destroy($xbd2907eac);
            x7dd880ed3:
        }
        x863a44074:
        x6b3bad17b:
        return 1;
    }
    public function x31e663546(x648d3cf04 $x3260fd339)
    {
        $x7cb415596 = xfdd8353ea::x8231635b0($xe6c2732f8->order_id);
        $x7cb415596->save();
        return xcc04b623b("\x73\x65\154\x6c\x65\162\x2e\157\x72\x64\145\x72\x5f\144\x65\164\141\x69\154\x73\x5f\x73\x65\154\x6c\x65\x72", compact("\157\162\x64\145\162"));
    }
    public function x9f72baa1c(x648d3cf04 $x3260fd339)
    {
        goto xef62e7b6b;
        xef62e7b6b:
        $x7cb415596 = xfdd8353ea::x8231635b0($xe6c2732f8->order_id);
        if (!$xe6c2732f8->courier) {
            goto x52907ff58;
        }
        $x754c5def8 = json_decode($x7cb415596->shipping_address, true);
        $x754c5def8["\143\157\165\162\151\145\162"] = $xe6c2732f8->courier;
        $x7cb415596->shipping_address = json_encode($x754c5def8);
        $x7cb415596->save();
        return 1;
        x52907ff58:
        $x7cb415596->delivery_viewed = "\x30";
        $x7cb415596->delivery_status = $xe6c2732f8->status;
        $x7cb415596->save();
        if (!($xe6c2732f8->status == "\143\141\156\143\145\x6c\x6c\x65\x64" && $x7cb415596->payment_type == "\167\x61\154\154\145\164")) {
            goto x55df66a63;
        }
        $x0ef3e1252 = x2e61020a6::where("\151\144", $x7cb415596->user_id)->first();
        $x0ef3e1252->balance += $x7cb415596->grand_total;
        $x0ef3e1252->save();
        x55df66a63:
        // If the order is cancelled and the seller commission is calculated, deduct seller earning
        if (!($xe6c2732f8->status == "\143\141\156\x63\x65\154\x6c\x65\x64" && $x7cb415596->user->user_type == "\163\x65\x6c\154\145\x72" && $x7cb415596->payment_status == "\160\x61\151\144" && $x7cb415596->commission_calculated == 1)) {
            goto x3ea5c1d82;
        }
        $x143e1f403 = $x7cb415596->commissionHistory->seller_earning;
        $x47d2ea5f5 = $x7cb415596->shop;
        $x47d2ea5f5->admin_to_pay -= $x143e1f403;
        goto xd623bfba0;
        xd623bfba0:
        $x47d2ea5f5->save();
        x3ea5c1d82:
        if (x86671cc44::x2728c96cc()->user_type == "\x73\145\154\x6c\x65\x72") {
            goto x38d226581;
        }
        foreach ($x7cb415596->orderDetails as $x081e021ee => $x6f39010db) {
            $x6f39010db->delivery_status = $xe6c2732f8->status;
            $x6f39010db->save();
            if (!($xe6c2732f8->status == "\x63\141\x6e\x63\x65\x6c\x6c\145\144")) {
                goto x4c4048768;
            }
            x02ede2a27($x6f39010db);
            x4c4048768:
            if (!xa3ef35575("\141\146\146\x69\x6c\151\x61\164\x65\137\163\171\163\x74\x65\155")) {
                goto xb1904e405;
            }
            if (!(($xe6c2732f8->status == "\144\145\154\x69\x76\x65\162\145\x64" || $xe6c2732f8->status == "\x63\141\x6e\x63\x65\x6c\154\x65\x64") && $x6f39010db->product_referral_code)) {
                goto x643d74f62;
            }
            $x0e5053ef9 = 0;
            $x9a34683e2 = 0;
            if (!($xe6c2732f8->status == "\x64\145\x6c\x69\x76\145\162\145\144")) {
                goto x0420f0886;
            }
            $x0e5053ef9 = $x6f39010db->quantity;
            x0420f0886:
            if (!($xe6c2732f8->status == "\x63\141\156\143\x65\154\154\x65\144")) {
                goto x9d4705a4d;
            }
            $x9a34683e2 = $x6f39010db->quantity;
            x9d4705a4d:
            $xab8092090 = x2e61020a6::where("\x72\145\146\145\x72\x72\141\x6c\137\143\x6f\144\x65", $x6f39010db->product_referral_code)->first();
            $xe796cd1b1 = new x1e8f41692();
            $xe796cd1b1->xe30b5cf25($xab8092090->id, 0, 0, $x0e5053ef9, $x9a34683e2);
            x643d74f62:
            xb1904e405:
            x73dcf391f:
        }
        x608b3fd26:
        goto xd862eef92;
        x38d226581:
        foreach ($x7cb415596->orderDetails->where("\163\x65\x6c\154\x65\x72\137\x69\x64", x86671cc44::x2728c96cc()->id) as $x081e021ee => $x6f39010db) {
            $x6f39010db->delivery_status = $xe6c2732f8->status;
            $x6f39010db->save();
            if (!($xe6c2732f8->status == "\143\x61\156\x63\x65\x6c\x6c\x65\x64")) {
                goto xfe3359f33;
            }
            x02ede2a27($x6f39010db);
            xfe3359f33:
            xd22153b72:
        }
        x148f52991:
        xd862eef92:
        if (!(xa3ef35575("\x6f\164\160\137\163\x79\163\x74\145\x6d") && xd899c8278::where("\x69\144\145\156\164\x69\x66\151\145\162", "\144\x65\154\151\x76\145\x72\x79\137\x73\x74\141\164\x75\163\x5f\143\150\141\x6e\147\145")->first()->status == 1)) {
            goto xf178a1185;
        }
        try {
            x047ccc111::x3899e254b(json_decode($x7cb415596->shipping_address)->phone, $x7cb415596);
        } catch (Exception $xcc5381189) {
        }
        xf178a1185:
        //sends Notifications to user
        x9d77de53a::x8d4c4cc12($x7cb415596, $xe6c2732f8->status);
        if (!(xe97fa64e5("\x67\157\157\147\154\145\137\x66\x69\x72\x65\142\141\x73\x65") == 1 && $x7cb415596->user->device_token != null)) {
            goto x785b5146b;
        }
        $xe6c2732f8->device_token = $x7cb415596->user->device_token;
        $xe6c2732f8->title = "\x4f\x72\x64\x65\x72\x20\165\160\x64\141\x74\x65\144\40\41";
        $x18ef9a74a = str_replace("\137", "\x0", $x7cb415596->delivery_status);
        $xe6c2732f8->text = "\40\x59\157\165\162\40\157\162\144\145\x72\40{$x7cb415596->code}\x20\x68\141\x73\40\142\145\x65\x6e\40{$x18ef9a74a}";
        $xe6c2732f8->type = "\157\162\144\x65\162";
        goto x4c5e72232;
        x4c5e72232:
        $xe6c2732f8->id = $x7cb415596->id;
        $xe6c2732f8->user_id = $x7cb415596->user->id;
        x9d77de53a::x4a87768c1($xe6c2732f8);
        x785b5146b:
        if (!xa3ef35575("\144\145\x6c\x69\166\145\x72\x79\x5f\142\x6f\x79")) {
            goto x548560b4a;
        }
        if (!(x86671cc44::x2728c96cc()->user_type == "\144\145\154\x69\x76\x65\162\171\x5f\x62\157\171")) {
            goto x146cd909d;
        }
        $xad43e9aa3 = new xcf11e3d2d();
        $xad43e9aa3->x8d764177b($x7cb415596);
        x146cd909d:
        x548560b4a:
        return 1;
        goto xc89081c14;
        xc89081c14:
    }
    public function xb99ce6a0f(x648d3cf04 $x3260fd339)
    {
        $x7cb415596 = xfdd8353ea::x8231635b0($xe6c2732f8->order_id);
        $x7cb415596->tracking_code = $xe6c2732f8->tracking_code;
        $x7cb415596->save();
        return 1;
    }
    public function xb8b1ebe7f(x648d3cf04 $x3260fd339)
    {
        goto xe56c539fe;
        x2fa2d6a9c:
        if (!(xa3ef35575("\x6f\x74\160\137\x73\171\x73\x74\x65\155") && xd899c8278::where("\151\144\x65\156\x74\151\146\x69\x65\x72", "\160\141\171\x6d\x65\x6e\164\x5f\x73\x74\x61\164\165\163\x5f\143\x68\141\x6e\x67\145")->first()->status == 1)) {
            goto x1f5023a0f;
        }
        try {
            x047ccc111::xff25580e4(json_decode($x7cb415596->shipping_address)->phone, $x7cb415596);
        } catch (Exception $xcc5381189) {
        }
        x1f5023a0f:
        return 1;
        goto x816fb8402;
        x014ad06c3:
        x65cb28463:
        $x18ef9a74a = "\x70\x61\151\x64";
        foreach ($x7cb415596->orderDetails as $x081e021ee => $x6f39010db) {
            if (!($x6f39010db->payment_status != "\160\141\x69\144")) {
                goto x32ec4549b;
            }
            $x18ef9a74a = "\x75\x6e\160\x61\x69\144";
            x32ec4549b:
            xfd77801dc:
        }
        xe159bdf94:
        $x7cb415596->payment_status = $x18ef9a74a;
        $x7cb415596->save();
        if (!($x7cb415596->payment_status == "\x70\141\x69\x64" && $x7cb415596->commission_calculated == 0)) {
            goto xf66d807d1;
        }
        x6e4e38b7d($x7cb415596);
        xf66d807d1:
        //sends Notifications to user
        x9d77de53a::x8d4c4cc12($x7cb415596, $xe6c2732f8->status);
        if (!(xe97fa64e5("\x67\x6f\x6f\x67\x6c\145\137\146\x69\162\x65\142\141\163\x65") == 1 && $x7cb415596->user->device_token != null)) {
            goto x50ece7ca4;
        }
        $xe6c2732f8->device_token = $x7cb415596->user->device_token;
        $xe6c2732f8->title = "\x4f\162\144\x65\x72\x20\165\x70\x64\x61\x74\x65\144\x20\41";
        $x18ef9a74a = str_replace("\x5f", "\x0", $x7cb415596->payment_status);
        $xe6c2732f8->text = "\x20\x59\x6f\x75\162\x20\157\x72\x64\145\x72\x20{$x7cb415596->code}\40\150\141\x73\40\142\145\x65\156\40{$x18ef9a74a}";
        $xe6c2732f8->type = "\157\162\144\145\162";
        $xe6c2732f8->id = $x7cb415596->id;
        $xe6c2732f8->user_id = $x7cb415596->user->id;
        x9d77de53a::x4a87768c1($xe6c2732f8);
        x50ece7ca4:
        goto x2fa2d6a9c;
        xe56c539fe:
        $x7cb415596 = xfdd8353ea::x8231635b0($xe6c2732f8->order_id);
        if (!($xe6c2732f8->commission && $xe6c2732f8->status)) {
            goto xcf3d72adb;
        }
        $x7cb415596->commission_status = $xe6c2732f8->status;
        $x7cb415596->save();
        return 1;
        xcf3d72adb:
        if (!($xe6c2732f8->commission && $xe6c2732f8->ref)) {
            goto x2fb45aba4;
        }
        $x7cb415596->commission_ref = $xe6c2732f8->ref;
        $x7cb415596->save();
        return 1;
        x2fb45aba4:
        $x7cb415596->payment_status_viewed = "\60";
        $x7cb415596->save();
        if (x86671cc44::x2728c96cc()->user_type == "\x73\x65\x6c\x6c\145\x72") {
            goto xc91b012ee;
        }
        foreach ($x7cb415596->orderDetails as $x081e021ee => $x6f39010db) {
            $x6f39010db->payment_status = $xe6c2732f8->status;
            $x6f39010db->save();
            x1803b8f9e:
        }
        x385814faf:
        goto x65cb28463;
        xc91b012ee:
        foreach ($x7cb415596->orderDetails->where("\163\x65\x6c\x6c\x65\x72\x5f\151\x64", x86671cc44::x2728c96cc()->id) as $x081e021ee => $x6f39010db) {
            $x6f39010db->payment_status = $xe6c2732f8->status;
            $x6f39010db->save();
            xd175a54ca:
        }
        x4ffb773fd:
        goto x014ad06c3;
        x816fb8402:
    }
    public function xefaf979cc(x648d3cf04 $x3260fd339)
    {
        if (!xa3ef35575("\144\145\154\x69\x76\x65\162\171\137\142\x6f\171")) {
            goto xfa947656b;
        }
        $x7cb415596 = xfdd8353ea::x8231635b0($xe6c2732f8->order_id);
        $x7cb415596->assign_delivery_boy = $xe6c2732f8->delivery_boy;
        $x7cb415596->delivery_history_date = date("\x59\55\x6d\55\144\40\x48\x3a\x69\x3a\163");
        $x7cb415596->save();
        $x9457dda59 = x492aca3aa::where("\x6f\162\144\145\x72\137\151\144", $x7cb415596->id)->where("\144\145\154\x69\166\x65\162\171\x5f\x73\x74\141\164\165\x73", $x7cb415596->delivery_status)->first();
        if (!empty($x9457dda59)) {
            goto x0c2c59141;
        }
        $x9457dda59 = new x492aca3aa();
        $x9457dda59->order_id = $x7cb415596->id;
        $x9457dda59->delivery_status = $x7cb415596->delivery_status;
        $x9457dda59->payment_type = $x7cb415596->payment_type;
        x0c2c59141:
        $x9457dda59->delivery_boy_id = $xe6c2732f8->delivery_boy;
        $x9457dda59->save();
        if (!(xa25b09905("\115\101\111\x4c\x5f\x55\x53\x45\x52\x4e\x41\x4d\x45") != null && xe97fa64e5("\x64\x65\x6c\151\x76\x65\162\x79\x5f\x62\x6f\171\137\155\141\151\x6c\137\156\157\164\151\x66\x69\143\x61\164\x69\x6f\x6e") == "\x31")) {
            goto x5ae2a7944;
        }
        $xe51937a3f["\166\x69\x65\167"] = "\x65\155\x61\x69\x6c\163\x2e\151\x6e\x76\x6f\151\143\145";
        $xe51937a3f["\x73\x75\142\x6a\145\143\164"] = x919f49a6c("\x59\157\165\x20\x61\x72\145\x20\141\x73\x73\x69\147\x6e\x65\144\40\164\157\40\144\145\154\x69\x76\145\x72\x79\40\x61\x6e\x20\x6f\162\x64\x65\162\x2e\x20\117\x72\x64\x65\162\40\x63\157\x64\145") . "\40\55\40" . $x7cb415596->code;
        $xe51937a3f["\146\x72\157\x6d"] = xa25b09905("\x4d\101\111\x4c\137\106\122\x4f\115\x5f\x41\104\104\122\x45\123\x53");
        $xe51937a3f["\x6f\162\144\145\162"] = $x7cb415596;
        try {
            xaa24a5dcf::x39c8d2a35($x7cb415596->delivery_boy->email)->queue(new xd10f8b2a1($xe51937a3f));
        } catch (Exception $xcc5381189) {
        }
        x5ae2a7944:
        if (!(xa3ef35575("\157\x74\x70\x5f\163\171\x73\164\145\155") && xd899c8278::where("\151\x64\145\x6e\164\151\146\x69\x65\162", "\141\x73\x73\151\147\x6e\x5f\x64\x65\154\151\166\x65\162\x79\137\142\157\x79")->first()->status == 1)) {
            goto x6a05be57c;
        }
        try {
            x047ccc111::xefaf979cc($x7cb415596->delivery_boy->phone, $x7cb415596->code);
        } catch (Exception $xcc5381189) {
        }
        x6a05be57c:
        xfa947656b:
        return 1;
    }
    public function xb0cf71dcd(x648d3cf04 $x3260fd339)
    {
        if (!$xe6c2732f8->id) {
            goto xd60e4930d;
        }
        return x904cb3d9b::xc94e36edb(new x9119ff973($xe6c2732f8->id), "\157\162\x64\x65\x72\163\x2e\170\x6c\x73\x78");
        xd60e4930d:
        return x54c158836();
    }
}