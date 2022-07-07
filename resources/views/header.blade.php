<header>
    <nav id="tabs">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="open-city">
                <div class="current-city d-flex align-items-center">
                    <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.3639 1.18197L6.18188 6.36394L0.999915 1.18197" stroke="#848484"/>
                    </svg>
                    <span>Мариуполь</span>
                </div>
                <div class="list-city"></div>
            </div>
            <ul class="menu d-flex">
                <li><a href="#">Начать работать с LIdza</a></li>
                <li><a href="#">Связаться с нами</a></li>
                <li><a href="#">О нас</a></li>
            </ul>
            <div id="lang" class="d-flex align-items-center justify-content-between">
                <a href="{{$lang['uk']}}" class="{{config('app.locale') == 'uk' ? 'active' : ''}}">укр</a>
                <a href="{{$lang['ru']}}" class="{{config('app.locale') == 'ru' ? 'active' : ''}}">рус</a>
            </div>
            <div class="">
                <a href="tel:0979878776" class="phone">097 987 8776</a>
                <a href="#">Обратная связь</a>
            </div>
        </div>
    </nav>
    @include('blocks.top_menu')
</header>
