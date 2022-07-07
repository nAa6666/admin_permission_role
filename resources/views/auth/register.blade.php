@extends('layout')
@push('css')
    <link rel="stylesheet" href="{{ mix('styles/compiled/pages/login.min.css') }}">
@endpush
@push('scripts')
    <script src="{{mix('js/pages/compiled/auth.min.js')}}"></script>
@endpush
@section('content')
    {{ Breadcrumbs::render('register') }}
    <div class="container">
        <div id="auth">
            <h1>Зарегистрироваться</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="user-enter select-status">
                    <select name="select_r" class="select-toggle">
                        <option value="0" selected>Пользователь</option>
                        @foreach($permissions as $permission)
                            <option value="{{$permission->id}}">{{$permission->name}}</option>
                        @endforeach
                    </select>
                </div>
                <input class="inp-auth" type="text" name="name" value="{{ old('name') }}" placeholder="Имя *" required>
                @error('name')
                <strong>{{ $message }}</strong>
                @enderror
                <input class="inp-auth" type="text" name="surname" value="{{ old('name') }}" placeholder="Фамилия *" required>
                @error('name')
                <strong>{{ $message }}</strong>
                @enderror
                <input class="inp-auth" type="text" name="patronymic" value="{{ old('name') }}" placeholder="Отчество" required>
                @error('name')
                <strong>{{ $message }}</strong>
                @enderror
                <input class="inp-auth" type="email" name="email" value="{{ old('email') }}" placeholder="Электроная почта *" required>
                @error('email')
                <strong>{{ $message }}</strong>
                @enderror
                <div class="password-block">
                    <input class="inp-auth @error('password') is-invalid @enderror" type="password" name="password" placeholder="Пароль *" required autocomplete="current-password">
                    <div class="password-toggle">
                        <svg class="pass-hide" width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19.3225 9.97091C18.6015 8.4521 17.7436 7.21343 16.7487 6.25489L15.7053 7.29833C16.5562 8.11146 17.2973 9.1752 17.9382 10.5C16.2319 14.0315 13.81 15.709 10.5 15.709C9.50646 15.709 8.59134 15.556 7.75462 15.25L6.62402 16.3806C7.78613 16.9172 9.07812 17.1856 10.5 17.1856C14.4416 17.1856 17.3824 15.1327 19.3225 11.0271C19.4005 10.8619 19.4409 10.6816 19.4409 10.499C19.4409 10.3164 19.4005 10.136 19.3225 9.97091ZM18.0188 3.39528L17.1445 2.52001C17.1293 2.50476 17.1112 2.49266 17.0913 2.4844C17.0714 2.47614 17.05 2.47189 17.0285 2.47189C17.0069 2.47189 16.9855 2.47614 16.9656 2.4844C16.9457 2.49266 16.9276 2.50476 16.9124 2.52001L14.6694 4.76192C13.4328 4.13028 12.043 3.81446 10.5 3.81446C6.5584 3.81446 3.61758 5.86729 1.67754 9.97296C1.59956 10.1381 1.55911 10.3184 1.55911 10.501C1.55911 10.6836 1.59956 10.864 1.67754 11.0291C2.4526 12.6615 3.3857 13.97 4.47685 14.9545L2.30672 17.124C2.27597 17.1548 2.2587 17.1965 2.2587 17.24C2.2587 17.2835 2.27597 17.3252 2.30672 17.356L3.1822 18.2314C3.21296 18.2622 3.25467 18.2795 3.29817 18.2795C3.34166 18.2795 3.38337 18.2622 3.41414 18.2314L18.0188 3.62743C18.034 3.6122 18.0461 3.5941 18.0544 3.57418C18.0626 3.55427 18.0669 3.53292 18.0669 3.51136C18.0669 3.4898 18.0626 3.46845 18.0544 3.44853C18.0461 3.42861 18.034 3.41052 18.0188 3.39528ZM3.06181 10.5C4.77012 6.96856 7.19209 5.29102 10.5 5.29102C11.6185 5.29102 12.6355 5.48298 13.5581 5.87324L12.1164 7.31494C11.4337 6.95065 10.6519 6.81545 9.88642 6.92928C9.12096 7.04312 8.41235 7.39997 7.86514 7.94718C7.31792 8.49439 6.96108 9.203 6.84724 9.96846C6.7334 10.7339 6.86861 11.5157 7.2329 12.1985L5.52214 13.9092C4.57529 13.0735 3.75908 11.9413 3.06181 10.5ZM8.12109 10.5C8.12145 10.1384 8.20711 9.78194 8.3711 9.45964C8.5351 9.13734 8.77281 8.85827 9.06493 8.64509C9.35704 8.43192 9.69532 8.29066 10.0523 8.23279C10.4093 8.17492 10.7748 8.20207 11.1193 8.31203L8.22999 11.2014C8.15757 10.9746 8.12083 10.738 8.12109 10.5Z" fill="#C2C2C2"/>
                            <path d="M10.418 12.7969C10.347 12.7969 10.2771 12.7936 10.2078 12.7872L9.12454 13.8705C9.77605 14.12 10.4859 14.1754 11.1682 14.0301C11.8506 13.8848 12.4763 13.5449 12.9696 13.0516C13.4629 12.5583 13.8027 11.9326 13.9481 11.2503C14.0934 10.5679 14.0379 9.85809 13.7884 9.20657L12.7052 10.2898C12.7116 10.3591 12.7148 10.429 12.7148 10.5C12.715 10.8017 12.6557 11.1004 12.5403 11.3792C12.425 11.6579 12.2558 11.9112 12.0425 12.1245C11.8291 12.3378 11.5759 12.507 11.2971 12.6224C11.0184 12.7377 10.7196 12.797 10.418 12.7969Z" fill="#C2C2C2"/>
                        </svg>
                        <svg class="pass-show" width="19" height="15" viewBox="0 0 19 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.3225 6.9709C16.3783 2.87549 13.4396 0.814453 9.5 0.814453C5.5584 0.814453 2.62168 2.87549 0.677537 6.97295C0.599557 7.13807 0.559114 7.31842 0.559114 7.50103C0.559114 7.68364 0.599557 7.86398 0.677537 8.0291C2.62168 12.1245 5.56045 14.1855 9.5 14.1855C13.4416 14.1855 16.3783 12.1245 18.3225 8.02705C18.4804 7.69482 18.4804 7.30928 18.3225 6.9709ZM9.5 12.709C6.19209 12.709 3.77012 11.0314 2.06182 7.5C3.77012 3.96855 6.19209 2.29102 9.5 2.29102C12.8079 2.29102 15.2299 3.96855 16.9382 7.5C15.2319 11.0314 12.81 12.709 9.5 12.709ZM9.41797 3.89062C7.42461 3.89062 5.8086 5.50664 5.8086 7.5C5.8086 9.49336 7.42461 11.1094 9.41797 11.1094C11.4113 11.1094 13.0274 9.49336 13.0274 7.5C13.0274 5.50664 11.4113 3.89062 9.41797 3.89062ZM9.41797 9.79688C8.14854 9.79688 7.1211 8.76943 7.1211 7.5C7.1211 6.23057 8.14854 5.20312 9.41797 5.20312C10.6874 5.20312 11.7148 6.23057 11.7148 7.5C11.7148 8.76943 10.6874 9.79688 9.41797 9.79688Z" fill="#C2C2C2"/>
                        </svg>
                    </div>
                    @error('password')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
                <input type="password" class="inp-auth" name="password_confirmation" placeholder="Повторите пароль" required>
                <div class="d-flex align-items-center justify-content-between remember-block">
                    <div class="remember-cont d-flex align-items-center">
                        <input type="checkbox" name="i_agree" id="i_agree" {{ old('i_agree') ? 'checked' : '' }}>
                        <div class="d-flex">
                            <label for="i_agree">Согласен на обработку&nbsp;</label>
                            <a href="#">своих персональных данных</a>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn">@lang('auth.register_btn')</button>
                <div class="d-flex justify-content-center register_btn">
                    <a href="{{route('login')}}">Я уже зарегистрирован</a>
                </div>
            </form>
        </div>
    </div>
{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@lang('auth.register')</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">@lang('auth.register_name')</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">@lang('auth.password')</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">@lang('auth.confirm_password')</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="select" class="col-md-4 col-form-label text-md-right">Зарегистрироваться как</label>
                            <div class="col-md-6">
                                <select id="select" class="form-control" name="select_r">
                                    <option value="0" selected>Пользователь</option>
                                    @foreach($permissions as $permission)
                                        <option value="{{$permission->id}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">@lang('auth.register_btn')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
@yield('footer')
