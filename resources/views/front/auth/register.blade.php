@extends('front.master')
@section('home-page-header-only')
    <div class="header_btm">
        <h2>Register</h2>
    </div>
@endsection

@section('style')
    <style>
        .only-form-box {
            max-width: 900px;
        }
    </style>
@endsection

@section('body')
    <div class="only-form-pages">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="only-form-box">
                        <div class="welcome-text text-center mb-5">
                            <h5 class="mb-0">Create an account!</h5>
                            <span>Already have an account? <a href="{{ route('front.login') }}">Log In!</a></span>
                        </div>
{{--                        <div>--}}
{{--                            <ul>--}}
{{--                                @foreach($errors as $error)--}}
{{--                                    <li>{{ $error }}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                        <form action="{{ route('front.register') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="com_class_form">
                                <div class="form-group user_type_cont">
                                    <label class="user_type" for="usertype-1">
                                        <input type="radio" {{ isset($_GET['type']) && $_GET['type'] == 1 ? 'checked' : '' }} name="user_role_type" id="usertype-1" value="1" >
                                        <span><i class="far fa-user"></i> Student</span>
                                    </label>
                                    <label class="user_type" for="usertype-2">
                                        <input type="radio" {{ isset($_GET['type']) && $_GET['type'] == 2 ? 'checked' : '' }} name="user_role_type" id="usertype-2" value="2" >
                                        <span><i class="fas fa-landmark"></i> SME</span>
                                    </label>
                                </div>
                                <div class="freelancer-inputs">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="first_name"  size="40" placeholder="First Name *">
                                            @error('first_name')<span class="text-danger f-s-12">{{ $errors->first('first_name') }}</span>@enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="last_name" size="40" placeholder="Last Name">
                                            @error('last_name')<span class="text-danger f-s-12">{{ $errors->first('last_name') }}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="client-inputs">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="company_name"  size="40" placeholder="Company Name *">
                                            @error('company_name')<span class="text-danger f-s-12">{{ $errors->first('company_name') }}</span>@enderror
                                        </div>
                                        <div class="col-sm-6">
                                            <input class="form-control" type="text" name="trade_license_no" size="40" placeholder="Trade License Number *">
                                            @error('trade_license_no')<span class="text-danger f-s-12">{{ $errors->first('trade_license_no') }}</span>@enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mt-3">
                                        <input class="form-control" type="text" name="name" size="40" placeholder="User Name *">
                                        @error('name')<span class="text-danger f-s-12">{{ $errors->first('name') }}</span>@enderror
                                    </div>
                                </div>
{{--                                <div class="form-group ">--}}
{{--                                    <div class="row" style="padding-left: 2%; padding-right: 2%">--}}
{{--                                        <select name="phone_country_code" class="col-4 form-control" id="">--}}
{{--                                            <option data-countryCode="US" value="1">(+1)</option>--}}
{{--                                            <option data-countryCode="DZ" value="213">(+213)</option>--}}
{{--                                            <option data-countryCode="AD" value="376">(+376)</option>--}}
{{--                                            <option data-countryCode="AO" value="244">(+244)</option>--}}
{{--                                            <option data-countryCode="AI" value="1264">(+1264)</option>--}}
{{--                                            <option data-countryCode="AG" value="1268">(+1268)</option>--}}
{{--                                            <option data-countryCode="AR" value="54">(+54)</option>--}}
{{--                                            <option data-countryCode="AM" value="374">(+374)</option>--}}
{{--                                            <option data-countryCode="AW" value="297">(+297)</option>--}}
{{--                                            <option data-countryCode="AU" value="61">(+61)</option>--}}
{{--                                            <option data-countryCode="AT" value="43">(+43)</option>--}}
{{--                                            <option data-countryCode="AZ" value="994">(+994)</option>--}}
{{--                                            <option data-countryCode="BS" value="1242">(+1242)</option>--}}
{{--                                            <option data-countryCode="BH" value="973">(+973)</option>--}}
{{--                                            <option data-countryCode="BD" value="880">(+880)</option>--}}
{{--                                            <option data-countryCode="BB" value="1246">(+1246)</option>--}}
{{--                                            <option data-countryCode="BY" value="375">(+375)</option>--}}
{{--                                            <option data-countryCode="BE" value="32">(+32)</option>--}}
{{--                                            <option data-countryCode="BZ" value="501">(+501)</option>--}}
{{--                                            <option data-countryCode="BJ" value="229">(+229)</option>--}}
{{--                                            <option data-countryCode="BM" value="1441">(+1441)</option>--}}
{{--                                            <option data-countryCode="BT" value="975">(+975)</option>--}}
{{--                                            <option data-countryCode="BO" value="591">(+591)</option>--}}
{{--                                            <option data-countryCode="BA" value="387">(+387)</option>--}}
{{--                                            <option data-countryCode="BW" value="267">(+267)</option>--}}
{{--                                            <option data-countryCode="BR" value="55">(+55)</option>--}}
{{--                                            <option data-countryCode="BN" value="673">(+673)</option>--}}
{{--                                            <option data-countryCode="BG" value="359">(+359)</option>--}}
{{--                                            <option data-countryCode="BF" value="226">(+226)</option>--}}
{{--                                            <option data-countryCode="BI" value="257">(+257)</option>--}}
{{--                                            <option data-countryCode="KH" value="855">(+855)</option>--}}
{{--                                            <option data-countryCode="CM" value="237">(+237)</option>--}}
{{--                                            <option data-countryCode="CA" value="1">(+1)</option>--}}
{{--                                            <option data-countryCode="CV" value="238">(+238)</option>--}}
{{--                                            <option data-countryCode="KY" value="1345">(+1345)</option>--}}
{{--                                            <option data-countryCode="CF" value="236">(+236)</option>--}}
{{--                                            <option data-countryCode="CL" value="56">(+56)</option>--}}
{{--                                            <option data-countryCode="CN" value="86">(+86)</option>--}}
{{--                                            <option data-countryCode="CO" value="57">(+57)</option>--}}
{{--                                            <option data-countryCode="KM" value="269">(+269)</option>--}}
{{--                                            <option data-countryCode="CG" value="242">(+242)</option>--}}
{{--                                            <option data-countryCode="CK" value="682">(+682)</option>--}}
{{--                                            <option data-countryCode="CR" value="506">(+506)</option>--}}
{{--                                            <option data-countryCode="HR" value="385">(+385)</option>--}}
{{--                                            <option data-countryCode="CU" value="53">(+53)</option>--}}
{{--                                            <option data-countryCode="CY" value="90392">(+90392)</option>--}}
{{--                                            <option data-countryCode="CY" value="357">(+357)</option>--}}
{{--                                            <option data-countryCode="CZ" value="42">(+42)</option>--}}
{{--                                            <option data-countryCode="DK" value="45">(+45)</option>--}}
{{--                                            <option data-countryCode="DJ" value="253">(+253)</option>--}}
{{--                                            <option data-countryCode="DM" value="1809">(+1809)</option>--}}
{{--                                            <option data-countryCode="DO" value="1809">(+1809)</option>--}}
{{--                                            <option data-countryCode="EC" value="593">(+593)</option>--}}
{{--                                            <option data-countryCode="EG" value="20">(+20)</option>--}}
{{--                                            <option data-countryCode="SV" value="503">(+503)</option>--}}
{{--                                            <option data-countryCode="GQ" value="240">(+240)</option>--}}
{{--                                            <option data-countryCode="ER" value="291">(+291)</option>--}}
{{--                                            <option data-countryCode="EE" value="372">(+372)</option>--}}
{{--                                            <option data-countryCode="ET" value="251">(+251)</option>--}}
{{--                                            <option data-countryCode="FK" value="500">(+500)</option>--}}
{{--                                            <option data-countryCode="FO" value="298">(+298)</option>--}}
{{--                                            <option data-countryCode="FJ" value="679">(+679)</option>--}}
{{--                                            <option data-countryCode="FI" value="358">(+358)</option>--}}
{{--                                            <option data-countryCode="FR" value="33">(+33)</option>--}}
{{--                                            <option data-countryCode="GF" value="594">(+594)</option>--}}
{{--                                            <option data-countryCode="PF" value="689">(+689)</option>--}}
{{--                                            <option data-countryCode="GA" value="241">(+241)</option>--}}
{{--                                            <option data-countryCode="GM" value="220">(+220)</option>--}}
{{--                                            <option data-countryCode="GE" value="7880">(+7880)</option>--}}
{{--                                            <option data-countryCode="DE" value="49">(+49)</option>--}}
{{--                                            <option data-countryCode="GH" value="233">(+233)</option>--}}
{{--                                            <option data-countryCode="GI" value="350">(+350)</option>--}}
{{--                                            <option data-countryCode="GR" value="30">(+30)</option>--}}
{{--                                            <option data-countryCode="GL" value="299">(+299)</option>--}}
{{--                                            <option data-countryCode="GD" value="1473">(+1473)</option>--}}
{{--                                            <option data-countryCode="GP" value="590">(+590)</option>--}}
{{--                                            <option data-countryCode="GU" value="671">(+671)</option>--}}
{{--                                            <option data-countryCode="GT" value="502">(+502)</option>--}}
{{--                                            <option data-countryCode="GN" value="224">(+224)</option>--}}
{{--                                            <option data-countryCode="GW" value="245">(+245)</option>--}}
{{--                                            <option data-countryCode="GY" value="592">(+592)</option>--}}
{{--                                            <option data-countryCode="HT" value="509">(+509)</option>--}}
{{--                                            <option data-countryCode="HN" value="504">(+504)</option>--}}
{{--                                            <option data-countryCode="HK" value="852">(+852)</option>--}}
{{--                                            <option data-countryCode="HU" value="36">(+36)</option>--}}
{{--                                            <option data-countryCode="IS" value="354">(+354)</option>--}}
{{--                                            <option data-countryCode="IN" value="91">(+91)</option>--}}
{{--                                            <option data-countryCode="ID" value="62">(+62)</option>--}}
{{--                                            <option data-countryCode="IR" value="98">(+98)</option>--}}
{{--                                            <option data-countryCode="IQ" value="964">(+964)</option>--}}
{{--                                            <option data-countryCode="IE" value="353">(+353)</option>--}}
{{--                                            <option data-countryCode="IL" value="972">(+972)</option>--}}
{{--                                            <option data-countryCode="IT" value="39">(+39)</option>--}}
{{--                                            <option data-countryCode="JM" value="1876">(+1876)</option>--}}
{{--                                            <option data-countryCode="JP" value="81">(+81)</option>--}}
{{--                                            <option data-countryCode="JO" value="962">(+962)</option>--}}
{{--                                            <option data-countryCode="KZ" value="7">(+7)</option>--}}
{{--                                            <option data-countryCode="KE" value="254">(+254)</option>--}}
{{--                                            <option data-countryCode="KI" value="686">(+686)</option>--}}
{{--                                            <option data-countryCode="KP" value="850">(+850)</option>--}}
{{--                                            <option data-countryCode="KR" value="82">(+82)</option>--}}
{{--                                            <option data-countryCode="KW" value="965">(+965)</option>--}}
{{--                                            <option data-countryCode="KG" value="996">(+996)</option>--}}
{{--                                            <option data-countryCode="LA" value="856">(+856)</option>--}}
{{--                                            <option data-countryCode="LV" value="371">(+371)</option>--}}
{{--                                            <option data-countryCode="LB" value="961">(+961)</option>--}}
{{--                                            <option data-countryCode="LS" value="266">(+266)</option>--}}
{{--                                            <option data-countryCode="LR" value="231">(+231)</option>--}}
{{--                                            <option data-countryCode="LY" value="218">(+218)</option>--}}
{{--                                            <option data-countryCode="LI" value="417">(+417)</option>--}}
{{--                                            <option data-countryCode="LT" value="370">(+370)</option>--}}
{{--                                            <option data-countryCode="LU" value="352">(+352)</option>--}}
{{--                                            <option data-countryCode="MO" value="853">(+853)</option>--}}
{{--                                            <option data-countryCode="MK" value="389">(+389)</option>--}}
{{--                                            <option data-countryCode="MG" value="261">(+261)</option>--}}
{{--                                            <option data-countryCode="MW" value="265">(+265)</option>--}}
{{--                                            <option data-countryCode="MY" value="60">(+60)</option>--}}
{{--                                            <option data-countryCode="MV" value="960">(+960)</option>--}}
{{--                                            <option data-countryCode="ML" value="223">(+223)</option>--}}
{{--                                            <option data-countryCode="MT" value="356">(+356)</option>--}}
{{--                                            <option data-countryCode="MH" value="692">(+692)</option>--}}
{{--                                            <option data-countryCode="MQ" value="596">(+596)</option>--}}
{{--                                            <option data-countryCode="MR" value="222">(+222)</option>--}}
{{--                                            <option data-countryCode="YT" value="269">(+269)</option>--}}
{{--                                            <option data-countryCode="MX" value="52">(+52)</option>--}}
{{--                                            <option data-countryCode="FM" value="691">(+691)</option>--}}
{{--                                            <option data-countryCode="MD" value="373">(+373)</option>--}}
{{--                                            <option data-countryCode="MC" value="377">(+377)</option>--}}
{{--                                            <option data-countryCode="MN" value="976">(+976)</option>--}}
{{--                                            <option data-countryCode="MS" value="1664">(+1664)</option>--}}
{{--                                            <option data-countryCode="MA" value="212">(+212)</option>--}}
{{--                                            <option data-countryCode="MZ" value="258">(+258)</option>--}}
{{--                                            <option data-countryCode="MN" value="95">(+95)</option>--}}
{{--                                            <option data-countryCode="NA" value="264">(+264)</option>--}}
{{--                                            <option data-countryCode="NR" value="674">(+674)</option>--}}
{{--                                            <option data-countryCode="NP" value="977">(+977)</option>--}}
{{--                                            <option data-countryCode="NL" value="31">(+31)</option>--}}
{{--                                            <option data-countryCode="NC" value="687">(+687)</option>--}}
{{--                                            <option data-countryCode="NZ" value="64">(+64)</option>--}}
{{--                                            <option data-countryCode="NI" value="505">(+505)</option>--}}
{{--                                            <option data-countryCode="NE" value="227">(+227)</option>--}}
{{--                                            <option data-countryCode="NG" value="234">(+234)</option>--}}
{{--                                            <option data-countryCode="NU" value="683">(+683)</option>--}}
{{--                                            <option data-countryCode="NF" value="672">(+672)</option>--}}
{{--                                            <option data-countryCode="NP" value="670">(+670)</option>--}}
{{--                                            <option data-countryCode="NO" value="47">(+47)</option>--}}
{{--                                            <option data-countryCode="OM" value="968">(+968)</option>--}}
{{--                                            <option data-countryCode="PW" value="680">(+680)</option>--}}
{{--                                            <option data-countryCode="PA" value="507">(+507)</option>--}}
{{--                                            <option data-countryCode="PG" value="675">(+675)</option>--}}
{{--                                            <option data-countryCode="PY" value="595">(+595)</option>--}}
{{--                                            <option data-countryCode="PE" value="51">(+51)</option>--}}
{{--                                            <option data-countryCode="PH" value="63">(+63)</option>--}}
{{--                                            <option data-countryCode="PL" value="48">(+48)</option>--}}
{{--                                            <option data-countryCode="PT" value="351">(+351)</option>--}}
{{--                                            <option data-countryCode="PR" value="1787">(+1787)</option>--}}
{{--                                            <option data-countryCode="QA" value="974">(+974)</option>--}}
{{--                                            <option data-countryCode="RE" value="262">(+262)</option>--}}
{{--                                            <option data-countryCode="RO" value="40">(+40)</option>--}}
{{--                                            <option data-countryCode="RU" value="7">(+7)</option>--}}
{{--                                            <option data-countryCode="RW" value="250">(+250)</option>--}}
{{--                                            <option data-countryCode="SM" value="378">(+378)</option>--}}
{{--                                            <option data-countryCode="ST" value="239">(+239)</option>--}}
{{--                                            <option data-countryCode="SA" value="966">(+966)</option>--}}
{{--                                            <option data-countryCode="SN" value="221">(+221)</option>--}}
{{--                                            <option data-countryCode="CS" value="381">(+381)</option>--}}
{{--                                            <option data-countryCode="SC" value="248">(+248)</option>--}}
{{--                                            <option data-countryCode="SL" value="232">(+232)</option>--}}
{{--                                            <option data-countryCode="SG" value="65">(+65)</option>--}}
{{--                                            <option data-countryCode="SK" value="421">(+421)</option>--}}
{{--                                            <option data-countryCode="SI" value="386">(+386)</option>--}}
{{--                                            <option data-countryCode="SB" value="677">(+677)</option>--}}
{{--                                            <option data-countryCode="SO" value="252">(+252)</option>--}}
{{--                                            <option data-countryCode="ZA" value="27">(+27)</option>--}}
{{--                                            <option data-countryCode="ES" value="34">(+34)</option>--}}
{{--                                            <option data-countryCode="LK" value="94">(+94)</option>--}}
{{--                                            <option data-countryCode="SH" value="290">(+290)</option>--}}
{{--                                            <option data-countryCode="KN" value="1869">(+1869)</option>--}}
{{--                                            <option data-countryCode="SC" value="1758">(+1758)</option>--}}
{{--                                            <option data-countryCode="SD" value="249">(+249)</option>--}}
{{--                                            <option data-countryCode="SR" value="597">(+597)</option>--}}
{{--                                            <option data-countryCode="SZ" value="268">(+268)</option>--}}
{{--                                            <option data-countryCode="SE" value="46">(+46)</option>--}}
{{--                                            <option data-countryCode="CH" value="41">(+41)</option>--}}
{{--                                            <option data-countryCode="SI" value="963">(+963)</option>--}}
{{--                                            <option data-countryCode="TW" value="886">(+886)</option>--}}
{{--                                            <option data-countryCode="TJ" value="7">(+7)</option>--}}
{{--                                            <option data-countryCode="TH" value="66">(+66)</option>--}}
{{--                                            <option data-countryCode="TG" value="228">(+228)</option>--}}
{{--                                            <option data-countryCode="TO" value="676">(+676)</option>--}}
{{--                                            <option data-countryCode="TT" value="1868">(+1868)</option>--}}
{{--                                            <option data-countryCode="TN" value="216">(+216)</option>--}}
{{--                                            <option data-countryCode="TR" value="90">(+90)</option>--}}
{{--                                            <option data-countryCode="TM" value="7">(+7)</option>--}}
{{--                                            <option data-countryCode="TM" value="993">(+993)</option>--}}
{{--                                            <option data-countryCode="TC" value="1649">(+1649)</option>--}}
{{--                                            <option data-countryCode="TV" value="688">(+688)</option>--}}
{{--                                            <option data-countryCode="UG" value="256">(+256)</option>--}}
{{--                                            <option data-countryCode="GB" value="44">(+44)</option>--}}
{{--                                            <option data-countryCode="UA" value="380">(+380)</option>--}}
{{--                                            <option data-countryCode="AE" value="971" selected>(+971)</option>--}}
{{--                                            <option data-countryCode="UY" value="598">(+598)</option>--}}
{{--                                            <option data-countryCode="UZ" value="7">(+7)</option>--}}
{{--                                            <option data-countryCode="VU" value="678">(+678)</option>--}}
{{--                                            <option data-countryCode="VA" value="379">(+379)</option>--}}
{{--                                            <option data-countryCode="VE" value="58">(+58)</option>--}}
{{--                                            <option data-countryCode="VN" value="84">(+84)</option>--}}
{{--                                            <option data-countryCode="VG" value="84">(+1284)</option>--}}
{{--                                            <option data-countryCode="VI" value="84">(+1340)</option>--}}
{{--                                            <option data-countryCode="WF" value="681">(+681)</option>--}}
{{--                                            <option data-countryCode="YE" value="969">(+969)</option>--}}
{{--                                            <option data-countryCode="YE" value="967">(+967)</option>--}}
{{--                                            <option data-countryCode="ZM" value="260">(+260)</option>--}}
{{--                                            <option data-countryCode="ZW" value="263">(+263)</option>--}}
{{--                                        </select>--}}
{{--                                        <input class="col-8 form-control" name="country_phone_number" type="text"  size="40" placeholder="Phone Number ">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="form-group">
                                    <input class="form-control" type="email" name="email" size="40" placeholder="Email address* ">
                                    @error('email')<span class="text-danger f-s-12">{{ $errors->first('email') }}</span>@enderror
                                </div>

                                <div class="form-group">
                                    <input class="form-control" type="password" name="password" placeholder=" Password * ">
                                    @error('password')<span class="text-danger f-s-12">{{ $errors->first('password') }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="password_confirmation" placeholder="Re-enter Password * ">
                                </div>
{{--                                <div class="form-group">--}}
{{--                                    <select class="form-control defaultSelect2" name="country" data-placeholder="Select a country">--}}
{{--                                        <option value=""></option>--}}
{{--                                        <option value="Afghanistan">Afghanistan</option>--}}
{{--                                        <option value="Åland Islands">Åland Islands</option>--}}
{{--                                        <option value="Albania">Albania</option>--}}
{{--                                        <option value="Algeria">Algeria</option>--}}
{{--                                        <option value="American Samoa">American Samoa</option>--}}
{{--                                        <option value="Andorra">Andorra</option>--}}
{{--                                        <option value="Angola">Angola</option>--}}
{{--                                        <option value="Anguilla">Anguilla</option>--}}
{{--                                        <option value="Antarctica">Antarctica</option>--}}
{{--                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>--}}
{{--                                        <option value="Argentina">Argentina</option>--}}
{{--                                        <option value="Armenia">Armenia</option>--}}
{{--                                        <option value="Aruba">Aruba</option>--}}
{{--                                        <option value="Australia">Australia</option>--}}
{{--                                        <option value="Austria">Austria</option>--}}
{{--                                        <option value="Azerbaijan">Azerbaijan</option>--}}
{{--                                        <option value="Bahamas">Bahamas</option>--}}
{{--                                        <option value="Bahrain">Bahrain</option>--}}
{{--                                        <option value="Bangladesh">Bangladesh</option>--}}
{{--                                        <option value="Barbados">Barbados</option>--}}
{{--                                        <option value="Belarus">Belarus</option>--}}
{{--                                        <option value="Belgium">Belgium</option>--}}
{{--                                        <option value="Belize">Belize</option>--}}
{{--                                        <option value="Benin">Benin</option>--}}
{{--                                        <option value="Bermuda">Bermuda</option>--}}
{{--                                        <option value="Bhutan">Bhutan</option>--}}
{{--                                        <option value="Bolivia">Bolivia</option>--}}
{{--                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>--}}
{{--                                        <option value="Botswana">Botswana</option>--}}
{{--                                        <option value="Bouvet Island">Bouvet Island</option>--}}
{{--                                        <option value="Brazil">Brazil</option>--}}
{{--                                        <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>--}}
{{--                                        <option value="Brunei Darussalam">Brunei Darussalam</option>--}}
{{--                                        <option value="Bulgaria">Bulgaria</option>--}}
{{--                                        <option value="Burkina Faso">Burkina Faso</option>--}}
{{--                                        <option value="Burundi">Burundi</option>--}}
{{--                                        <option value="Cambodia">Cambodia</option>--}}
{{--                                        <option value="Cameroon">Cameroon</option>--}}
{{--                                        <option value="Canada">Canada</option>--}}
{{--                                        <option value="Cape Verde">Cape Verde</option>--}}
{{--                                        <option value="Cayman Islands">Cayman Islands</option>--}}
{{--                                        <option value="Central African Republic">Central African Republic</option>--}}
{{--                                        <option value="Chad">Chad</option>--}}
{{--                                        <option value="Chile">Chile</option>--}}
{{--                                        <option value="China">China</option>--}}
{{--                                        <option value="Christmas Island">Christmas Island</option>--}}
{{--                                        <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>--}}
{{--                                        <option value="Colombia">Colombia</option>--}}
{{--                                        <option value="Comoros">Comoros</option>--}}
{{--                                        <option value="Congo">Congo</option>--}}
{{--                                        <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>--}}
{{--                                        <option value="Cook Islands">Cook Islands</option>--}}
{{--                                        <option value="Costa Rica">Costa Rica</option>--}}
{{--                                        <option value="Cote D'ivoire">Cote D'ivoire</option>--}}
{{--                                        <option value="Croatia">Croatia</option>--}}
{{--                                        <option value="Cuba">Cuba</option>--}}
{{--                                        <option value="Cyprus">Cyprus</option>--}}
{{--                                        <option value="Czech Republic">Czech Republic</option>--}}
{{--                                        <option value="Denmark">Denmark</option>--}}
{{--                                        <option value="Djibouti">Djibouti</option>--}}
{{--                                        <option value="Dominica">Dominica</option>--}}
{{--                                        <option value="Dominican Republic">Dominican Republic</option>--}}
{{--                                        <option value="Ecuador">Ecuador</option>--}}
{{--                                        <option value="Egypt">Egypt</option>--}}
{{--                                        <option value="El Salvador">El Salvador</option>--}}
{{--                                        <option value="Equatorial Guinea">Equatorial Guinea</option>--}}
{{--                                        <option value="Eritrea">Eritrea</option>--}}
{{--                                        <option value="Estonia">Estonia</option>--}}
{{--                                        <option value="Ethiopia">Ethiopia</option>--}}
{{--                                        <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>--}}
{{--                                        <option value="Faroe Islands">Faroe Islands</option>--}}
{{--                                        <option value="Fiji">Fiji</option>--}}
{{--                                        <option value="Finland">Finland</option>--}}
{{--                                        <option value="France">France</option>--}}
{{--                                        <option value="French Guiana">French Guiana</option>--}}
{{--                                        <option value="French Polynesia">French Polynesia</option>--}}
{{--                                        <option value="French Southern Territories">French Southern Territories</option>--}}
{{--                                        <option value="Gabon">Gabon</option>--}}
{{--                                        <option value="Gambia">Gambia</option>--}}
{{--                                        <option value="Georgia">Georgia</option>--}}
{{--                                        <option value="Germany">Germany</option>--}}
{{--                                        <option value="Ghana">Ghana</option>--}}
{{--                                        <option value="Gibraltar">Gibraltar</option>--}}
{{--                                        <option value="Greece">Greece</option>--}}
{{--                                        <option value="Greenland">Greenland</option>--}}
{{--                                        <option value="Grenada">Grenada</option>--}}
{{--                                        <option value="Guadeloupe">Guadeloupe</option>--}}
{{--                                        <option value="Guam">Guam</option>--}}
{{--                                        <option value="Guatemala">Guatemala</option>--}}
{{--                                        <option value="Guernsey">Guernsey</option>--}}
{{--                                        <option value="Guinea">Guinea</option>--}}
{{--                                        <option value="Guinea-bissau">Guinea-bissau</option>--}}
{{--                                        <option value="Guyana">Guyana</option>--}}
{{--                                        <option value="Haiti">Haiti</option>--}}
{{--                                        <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>--}}
{{--                                        <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>--}}
{{--                                        <option value="Honduras">Honduras</option>--}}
{{--                                        <option value="Hong Kong">Hong Kong</option>--}}
{{--                                        <option value="Hungary">Hungary</option>--}}
{{--                                        <option value="Iceland">Iceland</option>--}}
{{--                                        <option value="India">India</option>--}}
{{--                                        <option value="Indonesia">Indonesia</option>--}}
{{--                                        <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>--}}
{{--                                        <option value="Iraq">Iraq</option>--}}
{{--                                        <option value="Ireland">Ireland</option>--}}
{{--                                        <option value="Isle of Man">Isle of Man</option>--}}
{{--                                        <option value="Israel">Israel</option>--}}
{{--                                        <option value="Italy">Italy</option>--}}
{{--                                        <option value="Jamaica">Jamaica</option>--}}
{{--                                        <option value="Japan">Japan</option>--}}
{{--                                        <option value="Jersey">Jersey</option>--}}
{{--                                        <option value="Jordan">Jordan</option>--}}
{{--                                        <option value="Kazakhstan">Kazakhstan</option>--}}
{{--                                        <option value="Kenya">Kenya</option>--}}
{{--                                        <option value="Kiribati">Kiribati</option>--}}
{{--                                        <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>--}}
{{--                                        <option value="Korea, Republic of">Korea, Republic of</option>--}}
{{--                                        <option value="Kuwait">Kuwait</option>--}}
{{--                                        <option value="Kyrgyzstan">Kyrgyzstan</option>--}}
{{--                                        <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>--}}
{{--                                        <option value="Latvia">Latvia</option>--}}
{{--                                        <option value="Lebanon">Lebanon</option>--}}
{{--                                        <option value="Lesotho">Lesotho</option>--}}
{{--                                        <option value="Liberia">Liberia</option>--}}
{{--                                        <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>--}}
{{--                                        <option value="Liechtenstein">Liechtenstein</option>--}}
{{--                                        <option value="Lithuania">Lithuania</option>--}}
{{--                                        <option value="Luxembourg">Luxembourg</option>--}}
{{--                                        <option value="Macao">Macao</option>--}}
{{--                                        <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>--}}
{{--                                        <option value="Madagascar">Madagascar</option>--}}
{{--                                        <option value="Malawi">Malawi</option>--}}
{{--                                        <option value="Malaysia">Malaysia</option>--}}
{{--                                        <option value="Maldives">Maldives</option>--}}
{{--                                        <option value="Mali">Mali</option>--}}
{{--                                        <option value="Malta">Malta</option>--}}
{{--                                        <option value="Marshall Islands">Marshall Islands</option>--}}
{{--                                        <option value="Martinique">Martinique</option>--}}
{{--                                        <option value="Mauritania">Mauritania</option>--}}
{{--                                        <option value="Mauritius">Mauritius</option>--}}
{{--                                        <option value="Mayotte">Mayotte</option>--}}
{{--                                        <option value="Mexico">Mexico</option>--}}
{{--                                        <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>--}}
{{--                                        <option value="Moldova, Republic of">Moldova, Republic of</option>--}}
{{--                                        <option value="Monaco">Monaco</option>--}}
{{--                                        <option value="Mongolia">Mongolia</option>--}}
{{--                                        <option value="Montenegro">Montenegro</option>--}}
{{--                                        <option value="Montserrat">Montserrat</option>--}}
{{--                                        <option value="Morocco">Morocco</option>--}}
{{--                                        <option value="Mozambique">Mozambique</option>--}}
{{--                                        <option value="Myanmar">Myanmar</option>--}}
{{--                                        <option value="Namibia">Namibia</option>--}}
{{--                                        <option value="Nauru">Nauru</option>--}}
{{--                                        <option value="Nepal">Nepal</option>--}}
{{--                                        <option value="Netherlands">Netherlands</option>--}}
{{--                                        <option value="Netherlands Antilles">Netherlands Antilles</option>--}}
{{--                                        <option value="New Caledonia">New Caledonia</option>--}}
{{--                                        <option value="New Zealand">New Zealand</option>--}}
{{--                                        <option value="Nicaragua">Nicaragua</option>--}}
{{--                                        <option value="Niger">Niger</option>--}}
{{--                                        <option value="Nigeria">Nigeria</option>--}}
{{--                                        <option value="Niue">Niue</option>--}}
{{--                                        <option value="Norfolk Island">Norfolk Island</option>--}}
{{--                                        <option value="Northern Mariana Islands">Northern Mariana Islands</option>--}}
{{--                                        <option value="Norway">Norway</option>--}}
{{--                                        <option value="Oman">Oman</option>--}}
{{--                                        <option value="Pakistan">Pakistan</option>--}}
{{--                                        <option value="Palau">Palau</option>--}}
{{--                                        <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>--}}
{{--                                        <option value="Panama">Panama</option>--}}
{{--                                        <option value="Papua New Guinea">Papua New Guinea</option>--}}
{{--                                        <option value="Paraguay">Paraguay</option>--}}
{{--                                        <option value="Peru">Peru</option>--}}
{{--                                        <option value="Philippines">Philippines</option>--}}
{{--                                        <option value="Pitcairn">Pitcairn</option>--}}
{{--                                        <option value="Poland">Poland</option>--}}
{{--                                        <option value="Portugal">Portugal</option>--}}
{{--                                        <option value="Puerto Rico">Puerto Rico</option>--}}
{{--                                        <option value="Qatar">Qatar</option>--}}
{{--                                        <option value="Reunion">Reunion</option>--}}
{{--                                        <option value="Romania">Romania</option>--}}
{{--                                        <option value="Russian Federation">Russian Federation</option>--}}
{{--                                        <option value="Rwanda">Rwanda</option>--}}
{{--                                        <option value="Saint Helena">Saint Helena</option>--}}
{{--                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>--}}
{{--                                        <option value="Saint Lucia">Saint Lucia</option>--}}
{{--                                        <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>--}}
{{--                                        <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>--}}
{{--                                        <option value="Samoa">Samoa</option>--}}
{{--                                        <option value="San Marino">San Marino</option>--}}
{{--                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>--}}
{{--                                        <option value="Saudi Arabia">Saudi Arabia</option>--}}
{{--                                        <option value="Senegal">Senegal</option>--}}
{{--                                        <option value="Serbia">Serbia</option>--}}
{{--                                        <option value="Seychelles">Seychelles</option>--}}
{{--                                        <option value="Sierra Leone">Sierra Leone</option>--}}
{{--                                        <option value="Singapore">Singapore</option>--}}
{{--                                        <option value="Slovakia">Slovakia</option>--}}
{{--                                        <option value="Slovenia">Slovenia</option>--}}
{{--                                        <option value="Solomon Islands">Solomon Islands</option>--}}
{{--                                        <option value="Somalia">Somalia</option>--}}
{{--                                        <option value="South Africa">South Africa</option>--}}
{{--                                        <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>--}}
{{--                                        <option value="Spain">Spain</option>--}}
{{--                                        <option value="Sri Lanka">Sri Lanka</option>--}}
{{--                                        <option value="Sudan">Sudan</option>--}}
{{--                                        <option value="Suriname">Suriname</option>--}}
{{--                                        <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>--}}
{{--                                        <option value="Swaziland">Swaziland</option>--}}
{{--                                        <option value="Sweden">Sweden</option>--}}
{{--                                        <option value="Switzerland">Switzerland</option>--}}
{{--                                        <option value="Syrian Arab Republic">Syrian Arab Republic</option>--}}
{{--                                        <option value="Taiwan">Taiwan</option>--}}
{{--                                        <option value="Tajikistan">Tajikistan</option>--}}
{{--                                        <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>--}}
{{--                                        <option value="Thailand">Thailand</option>--}}
{{--                                        <option value="Timor-leste">Timor-leste</option>--}}
{{--                                        <option value="Togo">Togo</option>--}}
{{--                                        <option value="Tokelau">Tokelau</option>--}}
{{--                                        <option value="Tonga">Tonga</option>--}}
{{--                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>--}}
{{--                                        <option value="Tunisia">Tunisia</option>--}}
{{--                                        <option value="Turkey">Turkey</option>--}}
{{--                                        <option value="Turkmenistan">Turkmenistan</option>--}}
{{--                                        <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>--}}
{{--                                        <option value="Tuvalu">Tuvalu</option>--}}
{{--                                        <option value="Uganda">Uganda</option>--}}
{{--                                        <option value="Ukraine">Ukraine</option>--}}
{{--                                        <option value="United Arab Emirates" selected>United Arab Emirates</option>--}}
{{--                                        <option value="United Kingdom">United Kingdom</option>--}}
{{--                                        <option value="United States">United States</option>--}}
{{--                                        <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>--}}
{{--                                        <option value="Uruguay">Uruguay</option>--}}
{{--                                        <option value="Uzbekistan">Uzbekistan</option>--}}
{{--                                        <option value="Vanuatu">Vanuatu</option>--}}
{{--                                        <option value="Venezuela">Venezuela</option>--}}
{{--                                        <option value="Viet Nam">Viet Nam</option>--}}
{{--                                        <option value="Virgin Islands, British">Virgin Islands, British</option>--}}
{{--                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>--}}
{{--                                        <option value="Wallis and Futuna">Wallis and Futuna</option>--}}
{{--                                        <option value="Western Sahara">Western Sahara</option>--}}
{{--                                        <option value="Yemen">Yemen</option>--}}
{{--                                        <option value="Zambia">Zambia</option>--}}
{{--                                        <option value="Zimbabwe">Zimbabwe</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <select name="gender" class="form-control defaultSelect2" data-placeholder="Select a gender">--}}
{{--                                        <option value=""></option>--}}
{{--                                        <option value="Male">Male</option>--}}
{{--                                        <option value="Female">Female</option>--}}
{{--                                        <option value="Other">Other</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}

{{--                                <div class="form-group">--}}
{{--                                    <input type="text" class="form-control" id="datepicker" placeholder="Date of birth">--}}
{{--                                </div>--}}


                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" value="Register" >
                                </div>
                                <div class="form-group form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="remember_me"> Remember me
                                    </label>
                                </div>

                            </div>
                        </form>
                        <div class="social_login">
                            <p class="or_span"><span>or</span></p>
                            <button class="btn btn-facebook"><i class="fab fa-facebook-f"></i> Log In via Facebook</button>
                            <button class="btn btn-google"><i class="fab fa-google-plus-g"></i> Register via Google+</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @if(isset($_GET['type']))
        <script>
            $(function () {
                var userType = {!! $_GET['type'] !!};

                setTimeout(function () {
                    $('input[name="user_role_type"][value="'+userType+'"]').click();
                },500)
                showHideInputFields();
            })
        </script>
    @endif
    <script>
        $(document).on('click', '#usertype-1', function () {
            showHideInputFields();
        })
        $(document).on('click', '#usertype-2', function () {
            showHideInputFields();
        })
        function showHideInputFields() {
            var selectedUserType = $('input[name="user_role_type"]:checked').val();
            if (selectedUserType == 1)
            {
                $('.freelancer-inputs').removeClass('d-none');
                $('.client-inputs').addClass('d-none');
            } else if (selectedUserType == 2)
            {
                $('.client-inputs').removeClass('d-none');
                $('.freelancer-inputs').addClass('d-none');
            }

        }
    </script>
@endsection
