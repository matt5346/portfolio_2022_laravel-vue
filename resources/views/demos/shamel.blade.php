<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shamel</title>
    <meta name="description" content="Matvey Bochko">

    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicons/apple-180x180.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicons/apple-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicons/apple-72x72.png">

    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/images/favicons/favicon-16x16.png">

    <script async src="{{ asset('js/shamel.js') }}"></script>
</head>
<body class="body">
    <div class="preloader">
        <img class="preloader__gif" src="{{URL::to('/')}}/img/preloader.gif"/>
    </div>
    <div class="page" style="opacity: 0;">
        <header class="header">
            <div class="big_container">
                <nav class="nav">
                    <span class="logo">SHAMEL</span>
                    <ul class="nav__inner">
                        <li class="nav__inner_item">SERVICES</li>
                        <li class="nav__inner_item">
                            <button class="burger" id="burger_toggle">
                                <img src="{{URL::to('/')}}/img/burger.svg" alt="">
                            </button>
                        </li>
                        <li class="nav__inner_item">ABOUT</li>
                        <li class="nav__inner_item">
                            <img src="{{URL::to('/')}}/img/star.svg" alt="">
                        </li>
                    </ul>
                </nav>
                <div class="header__inner">
                    <div class="header__inner_left">
                        <div class="stroke_text_wrap">
                            <h1 class="stroke_text_wrap__text">FASHION</h1>
                            <img class="stroke_text_wrap__arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                        </div>
                        <div class="stroke_text_wrap">
                            <h1 class="stroke_text_wrap__text">DESIGN</h1>
                            <img class="stroke_text_wrap__arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                        </div>
                        <div class="stroke_text_wrap">
                            <h1 class="stroke_text_wrap__text">COVERS</h1>
                            <img class="stroke_text_wrap__arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                        </div>
                    </div>
                    <div class="container">
                        <div class="popup_box suvi_header">
                            <div class="popup_box__inner">
                                <img class="model_img" src="{{URL::to('/')}}/img/header_popup.png" alt="">
                                <div class="popup_box__description">
                                    <h1 class="title">Helen Keller A Telle</h1>
                                    <p class="model_description">Ageing Skin Care Doe chemical feeling slow the agings</p>
                                </div>
                            </div>
                            <img class="popup_arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                        </div>
                        <div id="progressVal" class="progressVal" aria-hidden="false">0%</div>
                        <div class="header__inner_right">
                            <div class="header__big_title bottom">
                                <span>KOPON</span>
                                <span class="prelast_char">E</span>
                                <span class="last_char">N</span>
                            </div>
                            <div class="background">
                                <div class="img_block" id="bg_block">
                                    <img class="header__img_1" src="{{URL::to('/')}}/img/img_1.png" alt="">
                                    <img class="header__img_2" src="{{URL::to('/')}}/img/img_2.png" alt="">
                                    <img class="header__img_3" src="{{URL::to('/')}}/img/img_1.png" alt="">
                                </div>
                                <div class="header__big_title">
                                    <span>SUVI</span>
                                </div>
                            </div>
                            <div class="foreground">
                                <div class="img_block" id="fg_block">
                                    <div class="title_box">
                                        <h3 class="title_box__name">PARIS</h3>
                                        <span class="title_box__date">2019</span>
                                    </div>
                                    <img class="header__img_1" src="{{URL::to('/')}}/img/img_2.png" alt="">
                                    <img class="header__img_2" src="{{URL::to('/')}}/img/img_1.png" alt="">
                                    <img class="header__img_3" src="{{URL::to('/')}}/img/img_2.png" alt="">
                                </div>
                            </div>
                            <img class="secondary_img_bg" src="{{URL::to('/')}}/img/img_3.png" alt="">
                        </div>
                        <div class="header__bottom">
                            <div class="models_box">
                                <div class="model">
                                    <h1 class="model__role">MODEL</h1>
                                    <p class="model__name">SUVI KOPONEN</p>
                                </div>
                                <div class="model">
                                    <h1 class="model__role">PHOTOGRAPHER</h1>
                                    <p class="model__name">MELANIE</p>
                                </div>
                                <div class="model">
                                    <h1 class="model__role">MAKEUP ARTIST</h1>
                                    <p class="model__name">MAKEUP ARTIST JORDI</p>
                                </div>
                            </div>
                            <div class="img_descirption">
                                <img src="{{URL::to('/')}}/img/img_pointer.svg" alt="">
                                <h1 class="img_descirption__text">
                                    MASSIMO DUTTI FALL-W<br>2019 AD COMPAIGN
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section class="section finnis">
            <div class="container">
                <div class="popup_box finnis_small" id="finnis_small">
                    <div class="popup_box__inner">
                        <img class="model_img" src="{{URL::to('/')}}/img/finnis_2.png" alt="">
                        <div class="popup_box__description">
                            <h1 class="title">www.vogue.com</h1>
                            <p class="model_description">Ageing Skin Care Doe chemical feeling slow the agings</p>
                        </div>
                    </div>
                    <img class="popup_arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                </div>
                <div class="finnis_box">
                    <div class="finnis_box__left">
                        <h1 class="finnis__title">
                            Starting on<br>
                            a Finnis<br>
                            television<br>
                            series
                            <small>
                                called<br>model school
                            </small>
                        </h1>
                    </div>
                    <div class="finnis_box__right">
                        <img src="{{URL::to('/')}}/img/finnis.png" alt="">
                        <div class="big_title">
                            <span>WINT</span>
                            <span class="finnis__prelast_char">E</span>
                            <span class="finnis__last_char">R</span>
                        </div>
                    </div>
                    <div class="popup_box big finnis">
                        <img class="img_overlay" id="finnis_overlay" src="{{URL::to('/')}}/img/finnis_3.png" alt="">
                        <div class="popup_box__description">
                            <p>
                                Her modeling career started in 2005 and by 2007 she was walking exclusively for Prada and Miu Miu, <small>in addition to having five editorials in various editions of Vogue Magazine</small>
                            </p>
                        </div>
                        <div class="popup_box__bottomDescription">
                            <p>
                                PRADA DUTTI FALL-WINter<br>2019 ad campaign
                            </p>
                            <p>
                                Miu Miu DUTTI FALL-summer<br>2017 ad campaign
                            </p>
                        </div>
                        <img class="popup_arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="section cards">
            <div class="container">
                <div class="cards_box">
                    <div class="cards_box__item">
                        <p class="description">
                            <b>L</b>
                            orem ipsum dolor sit amet consectetur adipisicing elit. Laudantium distinctio officiis dolor libero cupiditate atque laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro. laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro.
                        </p>
                    </div>
                    <div class="cards_box__item">
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium distinctio officiis dolor libero cupiditate atque laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro. laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro.</p>
                    </div>
                    <div class="cards_box__item">
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium distinctio officiis dolor libero cupiditate atque laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro. laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro.</p>
                        <img class="card_img" src="{{URL::to('/')}}/img/card_img.png" alt="">
                        <img class="card_arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="section chloe">
            <h1 class="chloe__bg"></h1>
            <div class="container">
                <div class="chloe__box">
                    <img class="chloe__first" src="{{URL::to('/')}}/img/chloe_1.png" alt="">
                    <img class="chloe__second" src="{{URL::to('/')}}/img/chloe_2.png" alt="">
                </div>
                <div class="popup_box chloe_small" id="chloe_popup">
                    <div class="popup_box__inner">
                        <img class="model_img" src="{{URL::to('/')}}/img/chloe_3.png" alt="">
                        <div class="popup_box__description">
                            <h1 class="title">www.vogue.com</h1>
                            <p class="model_description">Ageing Skin Care Doe chemical feeling slow the agings</p>
                        </div>
                    </div>
                    <img class="popup_arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                </div>
            </div>
        </section>
        <section class="section magazine">
            <div class="magazine__bg_box">
                <h1 class="magazine_box__title">
                    this week nordic<br>
                    model spotlight digs<br>
                    <small>
                        deeper into her<br>
                        career her style,<br>
                        and takes a look<br>
                        back at all her great<br>editorials!
                    </small>
                </h1>
            </div>
            <div class="container">
                <div class="popup_box model_magazine" id="magazine_popup">
                    <div class="popup_box__inner">
                        <img class="model_img" src="{{URL::to('/')}}/img/magazine_img_2.png" alt="">
                        <div class="popup_box__description">
                            <h1 class="title">Make It Your Destiny</h1>
                            <p class="model_description">Ready To Wear Bifoca feeling slow the agings</p>
                        </div>
                    </div>
                    <img class="popup_arrow" src="{{URL::to('/')}}/img/arrow.svg" alt="">
                </div>
                <div class="magazine_box">
                    <div class="magazine_box__left">
                        <img src="{{URL::to('/')}}/img/magazine_img_1.png" alt="">
                        <div class="big_title">
                            <span class="magazine__prelast_char">M</span>
                            <span class="magazine__last_char">A</span>
                            <span>GAZINE</span>
                        </div>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi magnam harum eum quia!</p>
                    </div>
                    <div class="magazine_box__right">
                        <img src="{{URL::to('/')}}/img/magazine_img_3.png" alt="">
                        <div class="big_title">
                            <span>Look ba</span>
                            <span class="magazine__prelast_char">C</span>
                            <span class="magazine__last_char">K</span>
                        </div>
                        <p class="description">
                            Lorem ipsum dolor sit amet<br>
                            consectetur adipisicing elit.<br>Nisi magnam harum eum quia!
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="section suvi">
            <div class="container">
                <div class="suvi_box">
                    <div class="suvi_box__left">
                        <span class="suvi__next">next</span>
                        <div class="next_arrow_box">
                            <img class="next main" src="{{URL::to('/')}}/img/arrow_1.svg" alt="">
                            <img class="next hidden" src="{{URL::to('/')}}/img/arrow_1_filled.svg" alt="">
                        </div>
                        <img class="prev" src="{{URL::to('/')}}/img/arrow_2.svg" alt="">
                        <span class="suvi__prev">prev</span>
                    </div>
                    <div class="suvi_box__middle">
                        <img class="img_bg" src="{{URL::to('/')}}/img/suvi_1.png" alt="">
                        <img class="img_fg" src="{{URL::to('/')}}/img/suvi_1_fg.png" alt="">
                    </div>
                    <div class="suvi_box__right">
                        <div class="description">
                            <p>
                                Suvi Koponen is phot Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia exercitationem ullam quidem sed recusandae mollitia expedita <small>veniam at consectetur totam debitis, iure, excepturi odit? Porro atque sed laborum aspernatur quos.</small>
                            </p>
                        </div>
                        <div class="image_block foreground">
                            <div class="image_block__title">
                                <h2>Unlocking The Bible</h2>
                                <h2>Life Advice Looking</h2>
                            </div>
                            <img src="{{URL::to('/')}}/img/suvi_2_fg.png" alt="">
                        </div>
                        <div class="image_block background">
                            <div class="image_block__title">
                                <h2>Mother Earth Hosts O</h2>
                                <h2>Become A Travel Pro</h2>
                            </div>
                            <img src="{{URL::to('/')}}/img/suvi_2.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section cards usual">
            <div class="overlay" id="cards_overlay"></div>
            <div class="container">
                <div class="cards_box">
                    <div class="cards_box__item">
                        <h1 class="card_title">What She Is Famous For</h1>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium distinctio officiis dolor libero cupiditate atque laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro. laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro.</p>
                    </div>
                    <div class="cards_box__item usual">
                        <h1 class="card_title">Style Summarized</h1>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium distinctio officiis dolor libero cupiditate atque laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro. laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro.</p>
                    </div>
                    <div class="cards_box__item usual">
                        <h1 class="card_title">Other Information</h1>
                        <p class="description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium distinctio officiis dolor libero cupiditate atque laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro. laborum impedit neque unde adipisci, similique dolorum quas doloremque doloribus id. A, laudantium. Dicta, porro.</p>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer">
            <div class="container">
                <div class="footer_box">
                    <h2 class="footer__title">Model</h2>
                    <div class="footer__suvi">
                        <span>SU</span>
                        <span class="footer__prelast_char">V</span>
                        <span class="footer__last_char">I</span>
                    </div>
                    <img class="footer_img" src="{{URL::to('/')}}/img/footer_img.png" alt="">
                    <div class="footer_box__bottom">
                        <div class="item">
                            <p>Designer</p>
                            <p>Slava Kornilov</p>
                        </div>
                        <div class="item">
                            <p>PHOTOGRAPHER</p>
                            <p>MELANIE</p>
                        </div>
                        <div class="item">
                            <p>MAKEUP ARTIST</p>
                            <p>JORDI fontanals</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_stamp">
                <span>AR</span>
            </div>
        </footer>
    </div>
</body>
</html>
