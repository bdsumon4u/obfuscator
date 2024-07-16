<?php

namespace x29c959d49;

goto x045bdaa94;
x045bdaa94:
use xc0157a7bd;
use x83588acfe;
use xffc9bb986;
use x642d1c43b;
use x81dada902;
goto xcd93b4c67;
xf95641d86:
class x7f687732e extends x5da82ea06
{
    public function __construct()
    {
        // Staff Permission Check
        $this->x2957ce1dc(["\x70\x65\162\155\151\163\163\x69\157\156\x3a\166\x69\145\167\137\141\x6c\x6c\x5f\157\162\144\x65\162\x73\174\166\x69\145\x77\137\x69\x6e\x68\x6f\165\x73\x65\x5f\157\162\x64\145\x72\x73\x7c\x76\151\x65\x77\x5f\163\x65\154\x6c\x65\162\x5f\x6f\162\x64\x65\162\163\x7c\x76\x69\145\x77\137\160\151\143\x6b\165\x70\x5f\x70\x6f\151\x6e\164\137\x6f\x72\144\145\162\163"])->only("\x61\154\x6c\x5f\157\162\144\x65\x72\163");
        $this->x2957ce1dc(["\x70\x65\162\155\151\163\x73\151\x6f\156\x3a\166\x69\x65\167\x5f\157\162\144\145\x72\x5f\144\145\164\x61\x69\x6c\x73"])->only("\163\150\157\x77");
        $this->x2957ce1dc(["\160\x65\162\155\151\x73\163\x69\157\x6e\x3a\144\145\154\x65\x74\145\x5f\x6f\x72\x64\x65\162"])->only("\144\x65\163\x74\x72\157\171", "\142\x75\x6c\x6b\x5f\157\162\144\145\162\x5f\144\x65\x6c\x65\164\x65");
    }
    // All Orders
    public function xf1b8a6cb2(x1b96ce943 $x5251d7296)
    {
        goto xf2930b3a9;
        xf9228cbd1:
        $x0d2fe20ba = x3b92db711::x3411c4f08("\151\144", "\x64\x65\x73\143");
        $xd19ba047c = x96d150c44::where("\165\x73\145\x72\x5f\x74\171\x70\145", "\141\144\155\x69\156")->first()->id;
        if (x0f1530bc0::xf341287a8() == "\151\156\150\x6f\x75\163\145\137\157\162\x64\x65\162\163\56\151\x6e\x64\x65\x78" && x01d1d71c9::x0b0adcb83()->xc0e7e4f58("\166\x69\x65\x77\137\151\x6e\x68\x6f\165\x73\x65\137\x6f\x72\x64\145\162\163")) {
            goto xecaa6e7b8;
        }
        if (x0f1530bc0::xf341287a8() == "\x73\145\154\x6c\x65\x72\x5f\x6f\x72\144\145\x72\x73\x2e\151\x6e\x64\145\170" && x01d1d71c9::x0b0adcb83()->xc0e7e4f58("\x76\x69\x65\167\137\x73\x65\x6c\154\x65\162\x5f\x6f\162\x64\145\162\163")) {
            goto x216e9f0b4;
        }
        if (x0f1530bc0::xf341287a8() == "\160\x69\143\153\x5f\165\x70\137\160\157\x69\x6e\164\x2e\151\x6e\144\x65\170" && x01d1d71c9::x0b0adcb83()->xc0e7e4f58("\x76\151\145\x77\x5f\x70\151\143\153\x75\160\137\160\157\151\x6e\164\137\x6f\x72\144\x65\x72\163")) {
            goto x62b5ada2a;
        }
        goto x45a23ba44;
        x98df8199b:
        if (!($xc838d8dec->xccb279795 != null)) {
            goto x5b41318ef;
        }
        $x0d2fe20ba = $x0d2fe20ba->where("\x64\x65\154\x69\x76\145\162\171\137\x73\164\141\x74\x75\163", $xc838d8dec->xccb279795);
        $xc4ec9ad0f = $xc838d8dec->xccb279795;
        x5b41318ef:
        if (!($x5c4d9ed83 != null)) {
            goto xfefdd2faa;
        }
        goto x9adf78eee;
        x45a23ba44:
        if (x0f1530bc0::xf341287a8() == "\141\154\x6c\137\157\x72\x64\x65\162\x73\56\x69\156\144\x65\170" && x01d1d71c9::x0b0adcb83()->xc0e7e4f58("\166\151\145\167\x5f\141\x6c\x6c\137\x6f\x72\144\145\x72\x73")) {
            goto x3ba2cb5bb;
        }
        goto x9f9118b05;
        xecaa6e7b8:
        $x0d2fe20ba = $x0d2fe20ba->where("\x6f\162\144\x65\162\163\56\163\145\x6c\154\145\x72\137\x69\x64", "\75", $xd19ba047c);
        goto x9f9118b05;
        goto xa8a03fa67;
        x9adf78eee:
        $x0d2fe20ba = $x0d2fe20ba->where("\143\162\x65\141\x74\145\144\137\x61\x74", "\x3e\75", date("\x59\x2d\155\55\144", strtotime(explode("\x20\x74\157\x20", $x5c4d9ed83)[0])) . "\x20\40\x30\60\72\60\60\72\60\60")->where("\143\162\145\x61\x74\x65\x64\137\x61\x74", "\x3c\75", date("\131\x2d\155\55\144", strtotime(explode("\x20\x74\157\40", $x5c4d9ed83)[1])) . "\x20\x20\x32\x33\x3a\65\x39\x3a\x35\x39");
        xfefdd2faa:
        $x0d2fe20ba = $x0d2fe20ba->x014a73fdd(15);
        return xfa7a9d989("\x62\x61\x63\153\x65\156\144\x2e\163\x61\x6c\145\x73\56\151\156\x64\145\170", compact("\x6f\162\144\x65\162\163", "\163\x6f\162\164\x5f\x73\x65\x61\x72\143\x68", "\160\141\171\x6d\145\x6e\164\137\163\x74\x61\164\165\x73", "\144\x65\154\x69\166\x65\162\x79\x5f\163\x74\x61\164\x75\163", "\144\141\164\x65"));
        goto x63c11fd51;
        xc0c602b9f:
        x123d7609b:
        if (!($xc838d8dec->xa4146dc98 != null)) {
            goto xa87ed6a46;
        }
        $x0d2fe20ba = $x0d2fe20ba->where("\x70\141\171\155\x65\x6e\x74\x5f\163\x74\141\x74\x75\163", $xc838d8dec->xa4146dc98);
        $xbd65032c6 = $xc838d8dec->xa4146dc98;
        xa87ed6a46:
        goto x98df8199b;
        xa8a03fa67:
        x216e9f0b4:
        $x0d2fe20ba = $x0d2fe20ba->where("\x6f\162\144\145\x72\x73\56\x73\x65\154\x6c\x65\x72\137\151\144", "\x21\x3d", $xd19ba047c);
        goto x9f9118b05;
        x62b5ada2a:
        if (!(x4134fa874("\x76\x65\x6e\144\157\x72\x5f\163\x79\163\x74\145\x6d\137\x61\x63\164\x69\x76\141\164\151\157\x6e") != 1)) {
            goto xa9b070360;
        }
        goto xf16cdc917;
        xf2930b3a9:
        xda7ca2dfc::x94e81ec41();
        $x5c4d9ed83 = $xc838d8dec->x41f5babf7;
        $xd392cb4fa = null;
        $xc4ec9ad0f = null;
        $xbd65032c6 = "\x0";
        goto xf9228cbd1;
        x687b5c848:
        xd30ecaadc:
        x9f9118b05:
        if (!$xc838d8dec->x6b38a74c0) {
            goto x123d7609b;
        }
        $xd392cb4fa = $xc838d8dec->x6b38a74c0;
        $x0d2fe20ba = $x0d2fe20ba->where("\x63\157\144\x65", "\154\151\153\x65", "\45" . $xd392cb4fa . "\x25");
        goto xc0c602b9f;
        x835e2ced2:
        x433d0fe68:
        goto x9f9118b05;
        x3ba2cb5bb:
        if (!(x4134fa874("\x76\x65\156\144\x6f\x72\137\x73\171\163\x74\145\155\137\141\143\164\x69\166\x61\164\151\x6f\x6e") != 1)) {
            goto xd30ecaadc;
        }
        $x0d2fe20ba = $x0d2fe20ba->where("\157\162\144\145\162\163\x2e\163\145\154\x6c\x65\x72\137\151\x64", "\75", $xd19ba047c);
        goto x687b5c848;
        xf16cdc917:
        $x0d2fe20ba = $x0d2fe20ba->where("\157\162\x64\145\x72\x73\56\x73\145\154\154\145\x72\x5f\x69\x64", "\75", $xd19ba047c);
        xa9b070360:
        $x0d2fe20ba->where("\163\150\151\160\x70\x69\x6e\x67\x5f\164\x79\160\x65", "\x70\x69\x63\153\165\x70\137\x70\157\x69\156\164")->x3411c4f08("\143\x6f\x64\145", "\144\145\x73\x63");
        if (!(x01d1d71c9::x0b0adcb83()->xef2ed9e79 == "\x73\164\x61\x66\x66" && x01d1d71c9::x0b0adcb83()->x61fa72a54->x43577b193 != null)) {
            goto x433d0fe68;
        }
        $x0d2fe20ba->where("\x73\150\151\x70\160\151\x6e\x67\137\164\x79\x70\x65", "\160\x69\x63\153\165\160\137\160\x6f\151\x6e\164")->where("\x70\x69\x63\x6b\165\160\x5f\160\157\x69\156\164\137\151\x64", x01d1d71c9::x0b0adcb83()->x61fa72a54->x43577b193->id);
        goto x835e2ced2;
        x63c11fd51:
    }
    public function xb502cb209($x4cc0f4181)
    {
        $x74c57d0c9 = x3b92db711::x21ef53f0d(xde177c587($xb261626cc));
        $x695ed4281 = json_decode($x74c57d0c9->x4eea9e778);
        $xc67201b5e = x96d150c44::where("\143\x69\x74\x79", $x695ed4281->xa697919d9)->where("\x75\x73\145\162\137\164\x79\160\145", "\144\145\x6c\x69\x76\x65\162\171\137\x62\x6f\x79")->get();
        $x74c57d0c9->x7a130f7b3 = 1;
        $x74c57d0c9->save();
        return xfa7a9d989("\142\x61\x63\153\x65\x6e\144\x2e\x73\x61\154\145\x73\56\163\150\x6f\x77", compact("\157\162\144\145\x72", "\144\145\154\x69\x76\145\162\x79\137\142\x6f\171\x73"));
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
    public function x6137bdb3a(x1b96ce943 $x5251d7296)
    {
        goto x424186f5c;
        x16a7be781:
        $x33be22047 = xc39474633::where("\151\144", $xd8b39998b[0]["\x61\x64\x64\x72\145\x73\x73\137\151\x64"])->first();
        $x9b9b58716 = [];
        if (!($x33be22047 != null)) {
            goto x24c43cd58;
        }
        $x9b9b58716["\156\141\x6d\145"] = x01d1d71c9::x0b0adcb83()->name;
        $x9b9b58716["\x65\155\141\151\154"] = x01d1d71c9::x0b0adcb83()->x9a97b8860;
        goto x2bf39e3ca;
        x424186f5c:
        $xd8b39998b = xb2b2743df::where("\165\x73\x65\x72\137\x69\x64", x01d1d71c9::x0b0adcb83()->id)->x73cfdd3fd()->get();
        if (!$xd8b39998b->isEmpty()) {
            goto x794f7261e;
        }
        x6f93de883(x89d550881("\131\157\165\162\x20\x63\141\162\164\40\151\x73\40\x65\155\x70\x74\x79"))->xf34275b9e();
        return x5a7b8e00b()->x3e6f1abea("\x68\157\155\145");
        x794f7261e:
        goto x16a7be781;
        x2bf39e3ca:
        $x9b9b58716["\x61\144\x64\x72\145\x73\163"] = $x33be22047->x67c673f88;
        $x9b9b58716["\143\x6f\165\156\x74\x72\171"] = $x33be22047->xda7fc8034->name;
        $x9b9b58716["\x73\x74\x61\164\145"] = $x33be22047->xb448d3620->name;
        $x9b9b58716["\x63\x69\164\x79"] = $x33be22047->xa697919d9->name;
        $x9b9b58716["\160\x6f\163\x74\x61\154\137\x63\157\144\x65"] = $x33be22047->x75837a697;
        goto xfb566da44;
        xfb566da44:
        $x9b9b58716["\x70\x68\x6f\x6e\145"] = $x33be22047->x97329c3de;
        $x9b9b58716["\163\x68\x69\x70\x70\x69\156\147"] = $x33be22047->x8a378b5a1;
        $x9b9b58716["\x63\x6f\x75\162\151\145\x72"] = $x33be22047->x1ae8ef5e6;
        // $shippingAddress['instruction'] = $address->instruction;
        if (!($x33be22047->x3b0767761 || $x33be22047->xe1f4c93e3)) {
            goto x6b03a0fc1;
        }
        $x9b9b58716["\x6c\141\x74\137\x6c\x61\156\147"] = $x33be22047->x3b0767761 . "\x2c" . $x33be22047->xe1f4c93e3;
        goto x2b33e09d2;
        xeb394c1ea:
        $xc9a0a1751->save();
        $xa88b1b6d9 = [];
        foreach ($xd8b39998b as $x30d25b76e) {
            $xae294077e = [];
            $xb97ba991a = xa2a9886cf::find($x30d25b76e["\x70\162\157\144\165\x63\164\137\x69\144"]);
            if (!isset($xa88b1b6d9[$xb97ba991a->x6d672b7f6])) {
                goto x3ac9c3bfb;
            }
            $xae294077e = $xa88b1b6d9[$xb97ba991a->x6d672b7f6];
            x3ac9c3bfb:
            array_push($xae294077e, $x30d25b76e);
            $xa88b1b6d9[$xb97ba991a->x6d672b7f6] = $xae294077e;
            xe0eaa8c1c:
        }
        x620f54cc6:
        foreach ($xa88b1b6d9 as $xc7dc28e5b) {
            goto x1ffaf2b8c;
            x11ed35bbc:
            x70cb5f5ed:
            goto x9c9e0ceb0;
            x8b08672f9:
            $x5721bfc9a = 0;
            //Order Details Storing
            foreach ($xc7dc28e5b as $x30d25b76e) {
                goto x0c89eaa09;
                x84893c053:
                xb00570315:
                x6f93de883(x89d550881("\x54\x68\x65\40\x72\x65\161\165\145\x73\164\145\x64\40\161\x75\141\156\x74\x69\164\171\40\x69\163\x20\x6e\x6f\164\40\141\166\x61\151\x6c\x61\x62\x6c\145\x20\146\157\x72\x20") . $xb97ba991a->x9e3e6f906("\156\141\x6d\x65"))->xf34275b9e();
                $x74c57d0c9->delete();
                return x5a7b8e00b()->x3e6f1abea("\x63\141\x72\x74")->send();
                goto x924299148;
                goto x79ee5ac96;
                x842fd12a1:
                x2e80af76e:
                if (!x9526e637c("\141\x66\x66\x69\x6c\151\141\x74\x65\x5f\163\171\163\x74\x65\155")) {
                    goto xa18850633;
                }
                if (!$x37cbb4aa8->x6a84077fe) {
                    goto x74a3f710d;
                }
                $xb8f7b0138 = x96d150c44::where("\162\x65\x66\x65\x72\x72\x61\154\137\x63\157\x64\145", $x37cbb4aa8->x6a84077fe)->first();
                $xf719ecc5b = new xa9c3abf60();
                goto xe2c97b7e2;
                x0fb46dd9c:
                $xaefc589bf += $x37cbb4aa8->x709316987;
                //End of storing shipping cost
                $x37cbb4aa8->x106f2f7fe = $x30d25b76e["\x71\x75\x61\x6e\164\151\x74\171"];
                if (!x9526e637c("\x63\154\x75\142\137\x70\x6f\151\156\164")) {
                    goto xf1eee5eec;
                }
                $x37cbb4aa8->xfcb0efbe7 = $xb97ba991a->xfcb0efbe7;
                xf1eee5eec:
                goto x5a1d469da;
                x4c58e9ee3:
                $xf8d31d7e4 = $x30d25b76e["\x76\141\x72\x69\141\x74\151\157\156"];
                $x864417914 = $xb97ba991a->xd14f51e8c->where("\166\141\162\x69\x61\x6e\164", $xf8d31d7e4)->first();
                if ($xb97ba991a->xe96764b84 != 1 && $x30d25b76e["\161\x75\141\156\x74\151\x74\171"] > $x864417914->x0632ddaea) {
                    goto xb00570315;
                }
                if ($xb97ba991a->xe96764b84 != 1) {
                    goto x36edeabd9;
                }
                goto x924299148;
                goto x84893c053;
                x7c5d8d95c:
                $x37cbb4aa8->x0e1a780c4 = $x30d25b76e["\x70\162\x69\143\x65"] * $x30d25b76e["\161\x75\141\156\164\151\164\171"];
                $x37cbb4aa8->xda115a114 = xebba43123($x30d25b76e, $xb97ba991a, false) * $x30d25b76e["\161\165\x61\156\x74\x69\x74\171"];
                $x37cbb4aa8->xafed6dd7b = $x30d25b76e["\x73\x68\x69\160\x70\151\156\147\137\164\x79\160\x65"];
                $x37cbb4aa8->x6a84077fe = $x30d25b76e["\160\162\157\x64\x75\143\x74\137\162\x65\x66\145\162\162\x61\154\137\143\x6f\144\x65"];
                $x37cbb4aa8->x709316987 = $x30d25b76e["\163\150\151\x70\160\x69\156\147\137\143\157\x73\164"];
                goto x0fb46dd9c;
                x353080315:
                $x37cbb4aa8->xd8fa01403 = $x74c57d0c9->id;
                $x37cbb4aa8->x042a5a224 = $xb97ba991a->x6d672b7f6;
                $x37cbb4aa8->x09fe46237 = $xb97ba991a->id;
                $x37cbb4aa8->x7fe42c2e9 = $xf8d31d7e4;
                $x37cbb4aa8->x28d431222 = x7ce49afa4($x30d25b76e, $xb97ba991a, false, false) * $x30d25b76e["\161\x75\x61\x6e\164\x69\x74\171"];
                goto x7c5d8d95c;
                xe2c97b7e2:
                $xf719ecc5b->x1349baf32($xb8f7b0138->id, 0, $x37cbb4aa8->x106f2f7fe, 0, 0);
                x74a3f710d:
                xa18850633:
                x8f375940e:
                goto x9afcce624;
                x83247359a:
                xa547d51d6:
                if (!($xb97ba991a->x8f3685af2 == "\x73\145\x6c\154\x65\162" && $xb97ba991a->xcb162f5bc->x285d44454 != null)) {
                    goto x2e80af76e;
                }
                $x97a6fe8d3 = $xb97ba991a->xcb162f5bc->x285d44454;
                $x97a6fe8d3->x00ee9f486 += $x30d25b76e["\161\165\x61\x6e\164\x69\164\171"];
                $x97a6fe8d3->save();
                goto x842fd12a1;
                x5a1d469da:
                $x37cbb4aa8->save();
                $xb97ba991a->x00ee9f486 += $x30d25b76e["\x71\x75\141\156\164\x69\164\171"];
                $xb97ba991a->save();
                $x74c57d0c9->x042a5a224 = $xb97ba991a->x6d672b7f6;
                $x74c57d0c9->xafed6dd7b = $x30d25b76e["\163\150\151\160\160\x69\156\x67\x5f\x74\171\x70\x65"];
                goto x5c4f48541;
                x5c4f48541:
                if (!($x30d25b76e["\x73\150\151\160\160\x69\156\147\137\x74\171\160\x65"] == "\x70\151\143\x6b\165\160\x5f\x70\157\151\x6e\x74")) {
                    goto xcaadb2b1c;
                }
                $x74c57d0c9->xcc67f0bae = $x30d25b76e["\160\151\143\153\x75\x70\137\x70\x6f\151\156\164"];
                xcaadb2b1c:
                if (!($x30d25b76e["\x73\150\x69\x70\160\x69\x6e\x67\x5f\x74\x79\160\145"] == "\143\141\162\162\151\x65\x72")) {
                    goto xa547d51d6;
                }
                $x74c57d0c9->xbe4f6c6e0 = $x30d25b76e["\x63\141\x72\x72\151\x65\x72\x5f\x69\x64"];
                goto x83247359a;
                x0c89eaa09:
                $xb97ba991a = xa2a9886cf::find($x30d25b76e["\160\162\x6f\x64\x75\143\x74\137\151\144"]);
                $xd7ac9c303 += x7ce49afa4($x30d25b76e, $xb97ba991a, false, false) * $x30d25b76e["\x71\x75\x61\x6e\x74\x69\164\171"];
                $x1ac1eeb03 += xebba43123($x30d25b76e, $xb97ba991a, false) * $x30d25b76e["\x71\x75\141\x6e\164\x69\x74\x79"];
                $xdcc869b93 += $x30d25b76e->x0e1a780c4 * $x30d25b76e["\161\165\x61\x6e\x74\x69\164\x79"];
                $x5721bfc9a += $x30d25b76e["\144\x69\163\x63\157\x75\156\x74"];
                goto x4c58e9ee3;
                x79ee5ac96:
                x36edeabd9:
                $x864417914->x0632ddaea -= $x30d25b76e["\x71\165\141\x6e\x74\x69\164\x79"];
                $x864417914->save();
                x924299148:
                $x37cbb4aa8 = new xe70edbeed();
                goto x353080315;
                x9afcce624:
            }
            x85da76cc8:
            $x74c57d0c9->x5bdbbc84c = $xd7ac9c303 + $x1ac1eeb03 + $xaefc589bf;
            if (!($xc7dc28e5b[0]->x1b5c2633a != null)) {
                goto x666fbda30;
            }
            goto x2f4b7fd87;
            x4af3370da:
            $x74c57d0c9->xf0456f1d9 = $xc838d8dec->xedb0a73ca;
            $x74c57d0c9->xa2f95897a = "\60";
            $x74c57d0c9->x7909136f1 = "\x30";
            $x74c57d0c9->code = date("\x59\x6d\x64\55\x48\151\x73") . rand(10, 99);
            $x74c57d0c9->x41f5babf7 = strtotime("\156\x6f\x77");
            goto x89e214886;
            x52707eeff:
            $xf56c85b7a->save();
            x666fbda30:
            $xc9a0a1751->x5bdbbc84c += $x74c57d0c9->x5bdbbc84c;
            $x74c57d0c9->xa0edbee66 = $xdcc869b93;
            $x74c57d0c9->save();
            goto x11ed35bbc;
            x2f4b7fd87:
            $x74c57d0c9->xa0883dde2 = $x5721bfc9a;
            $x74c57d0c9->x5bdbbc84c -= $x5721bfc9a;
            $xf56c85b7a = new x816cb89b4();
            $xf56c85b7a->x6d672b7f6 = x01d1d71c9::x0b0adcb83()->id;
            $xf56c85b7a->x637511474 = xaeaee26fe::where("\x63\157\x64\x65", $xc7dc28e5b[0]->x1b5c2633a)->first()->id;
            goto x52707eeff;
            x89e214886:
            $x74c57d0c9->save();
            $xd7ac9c303 = 0;
            $x1ac1eeb03 = 0;
            $xdcc869b93 = 0;
            $xaefc589bf = 0;
            goto x8b08672f9;
            x1ffaf2b8c:
            $x74c57d0c9 = new x3b92db711();
            $x74c57d0c9->x4bd2a545c = $xc9a0a1751->id;
            $x74c57d0c9->x6d672b7f6 = x01d1d71c9::x0b0adcb83()->id;
            $x74c57d0c9->x4eea9e778 = $xc9a0a1751->x4eea9e778;
            $x74c57d0c9->x00a4e8751 = $xc838d8dec->x00a4e8751;
            goto x4af3370da;
            x9c9e0ceb0:
        }
        goto x8a30e8cf3;
        x2b33e09d2:
        x6b03a0fc1:
        x24c43cd58:
        $xc9a0a1751 = new xf233d1a54();
        $xc9a0a1751->x6d672b7f6 = x01d1d71c9::x0b0adcb83()->id;
        $xc9a0a1751->x4eea9e778 = json_encode($x9b9b58716);
        goto xeb394c1ea;
        x8a30e8cf3:
        xfebc6cba4:
        $xc9a0a1751->save();
        $xc838d8dec->xc37f8858f()->put("\x63\157\155\x62\151\x6e\x65\144\137\157\162\x64\x65\162\137\x69\144", $xc9a0a1751->id);
        goto x78cff7220;
        x78cff7220:
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
    public function xc0dcf1085($x4cc0f4181)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(x1b96ce943 $x5251d7296, $x4cc0f4181)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($x4cc0f4181)
    {
        goto xbe03dc8dd;
        x1775876b2:
        xeb457b1be:
        return xc7bf392b2();
        goto xb9e830a48;
        xbf20f97b3:
        $x74c57d0c9->x8dfd42ff9()->delete();
        foreach ($x74c57d0c9->xcfa251ef5 as $x28642765a => $x4314b6ce6) {
            try {
                x22e3d57cd($x4314b6ce6);
            } catch (Exception $x62ff696fd) {
            }
            $x4314b6ce6->delete();
            x8db88a76b:
        }
        x8c1b37c7a:
        $x74c57d0c9->delete();
        x6f93de883(x89d550881("\x4f\162\144\145\162\x20\150\x61\x73\40\142\145\145\x6e\x20\x64\x65\154\x65\164\x65\144\40\163\x75\143\143\145\163\x73\146\x75\154\154\x79"))->x823698add();
        goto x1775876b2;
        xbe03dc8dd:
        $x74c57d0c9 = x3b92db711::x21ef53f0d($xb261626cc);
        if ($x74c57d0c9 != null) {
            goto x347f8c26d;
        }
        x6f93de883(x89d550881("\123\x6f\155\145\x74\150\x69\x6e\147\40\x77\145\156\x74\x20\x77\x72\157\156\x67"))->error();
        goto xeb457b1be;
        x347f8c26d:
        goto xbf20f97b3;
        xb9e830a48:
    }
    public function x9f8566591(x1b96ce943 $x5251d7296)
    {
        if (!$xc838d8dec->id) {
            goto x319ec8216;
        }
        foreach ($xc838d8dec->id as $x524d9b850) {
            $this->destroy($x524d9b850);
            xd170333f9:
        }
        xaebd87e84:
        x319ec8216:
        return 1;
    }
    public function x9987d10dc(x1b96ce943 $x5251d7296)
    {
        $x74c57d0c9 = x3b92db711::x21ef53f0d($xc838d8dec->xd8fa01403);
        $x74c57d0c9->save();
        return xfa7a9d989("\x73\145\x6c\x6c\145\x72\56\x6f\162\144\145\162\x5f\x64\145\x74\x61\151\x6c\x73\137\163\x65\154\x6c\145\162", compact("\x6f\162\x64\x65\162"));
    }
    public function xeeecc88fd(x1b96ce943 $x5251d7296)
    {
        goto xfc9534cd5;
        x5960ef5e4:
        goto x0b2fb5415;
        xd55581d8a:
        foreach ($x74c57d0c9->xcfa251ef5->where("\163\x65\154\x6c\145\162\x5f\x69\x64", x01d1d71c9::x0b0adcb83()->id) as $x28642765a => $x4314b6ce6) {
            $x4314b6ce6->xccb279795 = $xc838d8dec->xe7c79912f;
            $x4314b6ce6->save();
            if (!($xc838d8dec->xe7c79912f == "\x63\x61\x6e\x63\145\x6c\154\x65\x64")) {
                goto x8c466b573;
            }
            x22e3d57cd($x4314b6ce6);
            x8c466b573:
            x2f8fec92b:
        }
        xdbe54351b:
        x0b2fb5415:
        goto x9068ad0fb;
        xdddaec8e5:
        $xc838d8dec->x96241671b = $x74c57d0c9->xcb162f5bc->x96241671b;
        $xc838d8dec->x0384d1d0a = "\117\162\x64\145\162\40\x75\x70\x64\x61\x74\145\144\x20\41";
        $x52f9a94f0 = str_replace("\137", "\x0", $x74c57d0c9->xccb279795);
        $xc838d8dec->text = "\x20\131\157\165\162\x20\157\x72\x64\145\x72\40{$x74c57d0c9->code}\x20\x68\x61\x73\x20\x62\x65\x65\156\40{$x52f9a94f0}";
        $xc838d8dec->x386d5c9dd = "\x6f\162\144\x65\162";
        goto x455d55e9a;
        x9068ad0fb:
        if (!(x9526e637c("\157\164\x70\x5f\x73\171\163\x74\145\155") && xa285e3f09::where("\x69\x64\145\156\x74\x69\x66\151\145\162", "\x64\x65\x6c\x69\166\x65\162\171\x5f\163\x74\x61\164\165\163\x5f\143\x68\141\x6e\x67\145")->first()->xe7c79912f == 1)) {
            goto xa5c27eacb;
        }
        try {
            x0bc98326c::x401df5012(json_decode($x74c57d0c9->x4eea9e778)->x97329c3de, $x74c57d0c9);
        } catch (Exception $x62ff696fd) {
        }
        xa5c27eacb:
        //sends Notifications to user
        x86ced7d76::xebbcf04b2($x74c57d0c9, $xc838d8dec->xe7c79912f);
        if (!(x4134fa874("\147\x6f\157\x67\154\145\137\x66\x69\x72\x65\142\141\x73\x65") == 1 && $x74c57d0c9->xcb162f5bc->x96241671b != null)) {
            goto xe85603d67;
        }
        goto xdddaec8e5;
        x455d55e9a:
        $xc838d8dec->id = $x74c57d0c9->id;
        $xc838d8dec->x6d672b7f6 = $x74c57d0c9->xcb162f5bc->id;
        x86ced7d76::x82f59190c($xc838d8dec);
        xe85603d67:
        if (!x9526e637c("\144\x65\154\x69\166\145\x72\x79\137\x62\157\171")) {
            goto x8ad40b070;
        }
        goto xdbd06dfc9;
        xdbd06dfc9:
        if (!(x01d1d71c9::x0b0adcb83()->xef2ed9e79 == "\x64\x65\154\151\166\145\162\x79\x5f\x62\157\171")) {
            goto x75bd60698;
        }
        $x8a035f636 = new xd7e768138();
        $x8a035f636->xb10f724f7($x74c57d0c9);
        x75bd60698:
        x8ad40b070:
        goto xaf72c0d71;
        x2ed42533b:
        $x74c57d0c9->save();
        return 1;
        x557a4d620:
        $x74c57d0c9->xa2f95897a = "\60";
        $x74c57d0c9->xccb279795 = $xc838d8dec->xe7c79912f;
        goto x6fb88cba2;
        xaf72c0d71:
        return 1;
        goto xbf9b8bc7a;
        x8afa3dcf7:
        xb5b32760f:
        // If the order is cancelled and the seller commission is calculated, deduct seller earning
        if (!($xc838d8dec->xe7c79912f == "\x63\141\x6e\x63\x65\x6c\x6c\145\x64" && $x74c57d0c9->xcb162f5bc->xef2ed9e79 == "\163\x65\154\154\x65\162" && $x74c57d0c9->xa4146dc98 == "\x70\141\151\x64" && $x74c57d0c9->x6a15dff3c == 1)) {
            goto xc2584f973;
        }
        $xff9faf53b = $x74c57d0c9->x1ed245bc4->xadd455d93;
        $xbc9b1329f = $x74c57d0c9->x5055f927e;
        $xbc9b1329f->xd68f2140e -= $xff9faf53b;
        goto x05be4ea2c;
        xfc9534cd5:
        $x74c57d0c9 = x3b92db711::x21ef53f0d($xc838d8dec->xd8fa01403);
        if (!$xc838d8dec->x1ae8ef5e6) {
            goto x557a4d620;
        }
        $xbf886f58d = json_decode($x74c57d0c9->x4eea9e778, true);
        $xbf886f58d["\143\157\x75\162\151\x65\162"] = $xc838d8dec->x1ae8ef5e6;
        $x74c57d0c9->x4eea9e778 = json_encode($xbf886f58d);
        goto x2ed42533b;
        x6fb88cba2:
        $x74c57d0c9->save();
        if (!($xc838d8dec->xe7c79912f == "\143\141\x6e\x63\145\x6c\154\145\x64" && $x74c57d0c9->xf0456f1d9 == "\x77\x61\x6c\x6c\145\164")) {
            goto xb5b32760f;
        }
        $xbadf11d35 = x96d150c44::where("\x69\x64", $x74c57d0c9->x6d672b7f6)->first();
        $xbadf11d35->xcd443b5ba += $x74c57d0c9->x5bdbbc84c;
        $xbadf11d35->save();
        goto x8afa3dcf7;
        x05be4ea2c:
        $xbc9b1329f->save();
        xc2584f973:
        if (x01d1d71c9::x0b0adcb83()->xef2ed9e79 == "\x73\145\154\154\x65\162") {
            goto xd55581d8a;
        }
        foreach ($x74c57d0c9->xcfa251ef5 as $x28642765a => $x4314b6ce6) {
            goto x8c8d5762d;
            xb971b4b79:
            xf0932f399:
            goto x4687e5e93;
            x9e5251006:
            $x24000dfc4 = $x4314b6ce6->x106f2f7fe;
            x4ede80bd8:
            if (!($xc838d8dec->xe7c79912f == "\x63\x61\156\143\145\154\x6c\x65\144")) {
                goto x985dc7279;
            }
            $xdc66b20c0 = $x4314b6ce6->x106f2f7fe;
            x985dc7279:
            goto x89004c658;
            x8c8d5762d:
            $x4314b6ce6->xccb279795 = $xc838d8dec->xe7c79912f;
            $x4314b6ce6->save();
            if (!($xc838d8dec->xe7c79912f == "\143\x61\156\143\145\154\154\x65\144")) {
                goto x69529effa;
            }
            x22e3d57cd($x4314b6ce6);
            x69529effa:
            goto x8b25ef752;
            x8b25ef752:
            if (!x9526e637c("\x61\146\146\151\154\151\141\164\x65\x5f\x73\171\163\x74\145\155")) {
                goto x48248c907;
            }
            if (!(($xc838d8dec->xe7c79912f == "\144\x65\154\x69\166\145\162\145\x64" || $xc838d8dec->xe7c79912f == "\x63\141\x6e\x63\145\x6c\x6c\145\144") && $x4314b6ce6->x6a84077fe)) {
                goto x34444e378;
            }
            $x24000dfc4 = 0;
            $xdc66b20c0 = 0;
            if (!($xc838d8dec->xe7c79912f == "\144\x65\x6c\x69\166\145\x72\x65\144")) {
                goto x4ede80bd8;
            }
            goto x9e5251006;
            x89004c658:
            $xb8f7b0138 = x96d150c44::where("\162\145\x66\145\162\162\x61\x6c\137\x63\157\144\145", $x4314b6ce6->x6a84077fe)->first();
            $xf719ecc5b = new xa9c3abf60();
            $xf719ecc5b->x1349baf32($xb8f7b0138->id, 0, 0, $x24000dfc4, $xdc66b20c0);
            x34444e378:
            x48248c907:
            goto xb971b4b79;
            x4687e5e93:
        }
        x42d314010:
        goto x5960ef5e4;
        xbf9b8bc7a:
    }
    public function xd5da94259(x1b96ce943 $x5251d7296)
    {
        $x74c57d0c9 = x3b92db711::x21ef53f0d($xc838d8dec->xd8fa01403);
        $x74c57d0c9->xb1f1f3029 = $xc838d8dec->xb1f1f3029;
        $x74c57d0c9->save();
        return 1;
    }
    public function x529f24598(x1b96ce943 $x5251d7296)
    {
        goto xb17289791;
        x99b6fa135:
        x80a322741:
        $x74c57d0c9->x7909136f1 = "\x30";
        $x74c57d0c9->save();
        if (x01d1d71c9::x0b0adcb83()->xef2ed9e79 == "\163\x65\x6c\x6c\x65\162") {
            goto xb9307f756;
        }
        foreach ($x74c57d0c9->xcfa251ef5 as $x28642765a => $x4314b6ce6) {
            $x4314b6ce6->xa4146dc98 = $xc838d8dec->xe7c79912f;
            $x4314b6ce6->save();
            x7a7c7bef2:
        }
        goto x3ff58a14a;
        xb17289791:
        $x74c57d0c9 = x3b92db711::x21ef53f0d($xc838d8dec->xd8fa01403);
        if (!($xc838d8dec->x7759fddce && $xc838d8dec->xe7c79912f)) {
            goto x3931a59c2;
        }
        $x74c57d0c9->x721c83360 = $xc838d8dec->xe7c79912f;
        $x74c57d0c9->save();
        return 1;
        goto x688f33b08;
        x688f33b08:
        x3931a59c2:
        if (!($xc838d8dec->x7759fddce && $xc838d8dec->x10c396db3)) {
            goto x80a322741;
        }
        $x74c57d0c9->x1c37aa7d1 = $xc838d8dec->x10c396db3;
        $x74c57d0c9->save();
        return 1;
        goto x99b6fa135;
        x0e514a4fc:
        $x74c57d0c9->save();
        if (!($x74c57d0c9->xa4146dc98 == "\x70\141\x69\144" && $x74c57d0c9->x6a15dff3c == 0)) {
            goto x9b7b1c86b;
        }
        x45f08d18c($x74c57d0c9);
        x9b7b1c86b:
        //sends Notifications to user
        x86ced7d76::xebbcf04b2($x74c57d0c9, $xc838d8dec->xe7c79912f);
        goto x1eb50eef8;
        x54301a38d:
        if (!(x9526e637c("\x6f\x74\x70\x5f\x73\x79\163\164\x65\155") && xa285e3f09::where("\151\144\x65\156\164\x69\146\x69\145\x72", "\160\141\171\155\x65\156\164\x5f\x73\x74\x61\x74\165\163\x5f\x63\x68\141\x6e\147\145")->first()->xe7c79912f == 1)) {
            goto x4f4bb3d74;
        }
        try {
            x0bc98326c::x1c7228bd5(json_decode($x74c57d0c9->x4eea9e778)->x97329c3de, $x74c57d0c9);
        } catch (Exception $x62ff696fd) {
        }
        x4f4bb3d74:
        return 1;
        goto xc40368804;
        x3ff58a14a:
        xa8e9c4642:
        goto xedbeae9b6;
        xb9307f756:
        foreach ($x74c57d0c9->xcfa251ef5->where("\x73\145\x6c\154\x65\162\137\151\x64", x01d1d71c9::x0b0adcb83()->id) as $x28642765a => $x4314b6ce6) {
            $x4314b6ce6->xa4146dc98 = $xc838d8dec->xe7c79912f;
            $x4314b6ce6->save();
            x8cb0c8269:
        }
        x62c0e0886:
        goto x12f9268a2;
        x1eb50eef8:
        if (!(x4134fa874("\147\157\x6f\x67\x6c\x65\137\146\151\162\145\x62\x61\163\145") == 1 && $x74c57d0c9->xcb162f5bc->x96241671b != null)) {
            goto xe34f76abf;
        }
        $xc838d8dec->x96241671b = $x74c57d0c9->xcb162f5bc->x96241671b;
        $xc838d8dec->x0384d1d0a = "\117\x72\144\x65\x72\40\165\x70\144\x61\x74\145\144\x20\x21";
        $x52f9a94f0 = str_replace("\137", "\x0", $x74c57d0c9->xa4146dc98);
        $xc838d8dec->text = "\x20\131\157\165\x72\x20\157\162\x64\145\162\40{$x74c57d0c9->code}\x20\150\141\x73\x20\x62\x65\x65\x6e\40{$x52f9a94f0}";
        goto xff3d31a2c;
        x12f9268a2:
        xedbeae9b6:
        $x52f9a94f0 = "\160\x61\151\x64";
        foreach ($x74c57d0c9->xcfa251ef5 as $x28642765a => $x4314b6ce6) {
            if (!($x4314b6ce6->xa4146dc98 != "\160\141\151\x64")) {
                goto xf49f52fb8;
            }
            $x52f9a94f0 = "\165\x6e\x70\141\151\144";
            xf49f52fb8:
            x4d99affcb:
        }
        x1b3f126ca:
        $x74c57d0c9->xa4146dc98 = $x52f9a94f0;
        goto x0e514a4fc;
        xff3d31a2c:
        $xc838d8dec->x386d5c9dd = "\157\162\x64\145\x72";
        $xc838d8dec->id = $x74c57d0c9->id;
        $xc838d8dec->x6d672b7f6 = $x74c57d0c9->xcb162f5bc->id;
        x86ced7d76::x82f59190c($xc838d8dec);
        xe34f76abf:
        goto x54301a38d;
        xc40368804:
    }
    public function xebaa6fd22(x1b96ce943 $x5251d7296)
    {
        goto x50275533c;
        xc57f1a08c:
        $x7e2e39615["\x76\x69\x65\167"] = "\x65\155\141\x69\154\163\56\151\x6e\166\157\x69\143\145";
        $x7e2e39615["\163\165\x62\x6a\x65\143\164"] = x89d550881("\131\x6f\165\x20\141\x72\x65\x20\141\x73\163\x69\147\156\145\144\40\164\x6f\x20\144\145\x6c\x69\x76\x65\x72\171\40\141\x6e\40\x6f\x72\x64\145\x72\x2e\x20\x4f\x72\144\x65\162\x20\x63\x6f\144\145") . "\x20\55\x20" . $x74c57d0c9->code;
        $x7e2e39615["\146\162\x6f\x6d"] = x0a51a839b("\x4d\x41\x49\x4c\137\x46\x52\117\115\x5f\101\104\x44\x52\x45\123\x53");
        $x7e2e39615["\157\x72\x64\145\x72"] = $x74c57d0c9;
        try {
            x4363ff97f::x22cf6ac33($x74c57d0c9->x10f362650->x9a97b8860)->queue(new x596a4d183($x7e2e39615));
        } catch (Exception $x62ff696fd) {
        }
        goto x42596f86c;
        xaf7a68faf:
        $x2f69675c7 = xe33f11f1d::where("\157\162\144\x65\x72\x5f\151\144", $x74c57d0c9->id)->where("\x64\x65\x6c\x69\x76\x65\162\x79\137\x73\164\141\164\165\163", $x74c57d0c9->xccb279795)->first();
        if (!empty($x2f69675c7)) {
            goto xe891e504d;
        }
        $x2f69675c7 = new xe33f11f1d();
        $x2f69675c7->xd8fa01403 = $x74c57d0c9->id;
        $x2f69675c7->xccb279795 = $x74c57d0c9->xccb279795;
        goto xfe7f0dad7;
        x2a38bbaba:
        return 1;
        goto x61e3ef363;
        x42596f86c:
        xb68610da8:
        if (!(x9526e637c("\157\x74\x70\x5f\163\171\163\x74\145\155") && xa285e3f09::where("\x69\x64\145\156\x74\151\146\x69\x65\x72", "\141\x73\163\x69\147\156\x5f\144\x65\x6c\x69\166\x65\x72\171\137\x62\x6f\171")->first()->xe7c79912f == 1)) {
            goto x8f920d056;
        }
        try {
            x0bc98326c::xebaa6fd22($x74c57d0c9->x10f362650->x97329c3de, $x74c57d0c9->code);
        } catch (Exception $x62ff696fd) {
        }
        x8f920d056:
        xf1cfe3dce:
        goto x2a38bbaba;
        x50275533c:
        if (!x9526e637c("\144\145\x6c\x69\166\x65\x72\x79\137\142\x6f\x79")) {
            goto xf1cfe3dce;
        }
        $x74c57d0c9 = x3b92db711::x21ef53f0d($xc838d8dec->xd8fa01403);
        $x74c57d0c9->x030f43ecc = $xc838d8dec->x10f362650;
        $x74c57d0c9->xb1a645a50 = date("\x59\x2d\x6d\x2d\144\40\x48\x3a\x69\x3a\x73");
        $x74c57d0c9->save();
        goto xaf7a68faf;
        xfe7f0dad7:
        $x2f69675c7->xf0456f1d9 = $x74c57d0c9->xf0456f1d9;
        xe891e504d:
        $x2f69675c7->x32f4f1485 = $xc838d8dec->x10f362650;
        $x2f69675c7->save();
        if (!(x0a51a839b("\115\x41\111\x4c\x5f\x55\123\105\x52\x4e\101\x4d\x45") != null && x4134fa874("\x64\145\x6c\151\166\145\x72\x79\137\142\157\x79\x5f\155\141\x69\154\137\156\157\164\x69\x66\x69\x63\x61\x74\x69\x6f\x6e") == "\61")) {
            goto xb68610da8;
        }
        goto xc57f1a08c;
        x61e3ef363:
    }
    public function xfc9f53426(x1b96ce943 $x5251d7296)
    {
        if (!$xc838d8dec->id) {
            goto xe833dba54;
        }
        return x4d6c3bab9::xfb7dbac01(new x21b2feeb6($xc838d8dec->id), "\x6f\x72\144\145\162\x73\x2e\x78\154\163\170");
        xe833dba54:
        return xc7bf392b2();
    }
}
goto x500fd2fab;
xc300d29b2:
use xf1372d666;
use xeeb822266;
use xab2e017d7;
use x72dd7fdb7;
use x2c4318546;
goto xf95641d86;
xcd93b4c67:
use x029b98c1d;
use x1a64e7339;
use x8677fa02a;
use xbbe2ed2a3;
use x080a58947;
goto x9d9263eb6;
x9d9263eb6:
use xfaa658513;
use x4218b34c3;
use xfa2e998e2;
use x134fed16d;
use x14751f9ee;
goto xc300d29b2;
x500fd2fab: