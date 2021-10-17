<div class="footer__wrapper">
    <div class="container">
        <div class="footer__about">
            <div class="footer__logo">
                <img src="https://ik.imagekit.io/z0he7w4iilk/tr:w-274,h-50/assets/img/pintarpet-mascot-left-text-white_laohUSBD4.png"
                    alt="Pet Pintar">
            </div>
            <div class="footer__description">
                <span>
                    Sumber informasi seputar tips dan kesehatan hewan peliharaan terlengkap yang dirangkum dari
                    beberapa sumber terpercaya.
                </span>
            </div>
            <div class="footer__contact">
                <span>
                    Hubungi kami disini:
                </span>
                <div class="footer__contact-list">
                    <span>
                        <i class="far fa-envelope"></i>
                        Email
                    </span>
                    <span>
                        : info@pintarpet.com
                    </span>
                </div>
                <div class="footer__contact-list">
                    <span>
                        <i class="fab fa-whatsapp"></i>
                        WhatsApp
                    </span>
                    <span>
                        : 0812-1121-6467
                    </span>
                </div>
                <div class="footer__contact-list">
                    <span>
                        <i class="fab fa-instagram"></i>
                        Instagram
                    </span>
                    <span>
                        : @pintarpet
                    </span>
                </div>
            </div>
        </div>
        <div class="footer__category">
            <div class="footer__category-section-name">
                <span>
                    Kategori
                </span>
            </div>
            <div class="footer__category-content">
                @foreach ($categories as $category)
                    <div class="footer__category-list">
                        <div class="footer__category-list-name">
                            <a href="{{ url($category->name) }}">
                                {{ $category->name }}
                            </a>
                        </div>
                        <div class="footer__category-total-post {{ strtolower($category->name) }}">
                            <span>
                                {{ $category->posts_count }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="bottom-bar__wrapper">
    <div class="container">
        <span>
            © Copyright 2021 PintarPet. All Rights Reserved Powered by PintarPet
        </span>
    </div>
</div>
