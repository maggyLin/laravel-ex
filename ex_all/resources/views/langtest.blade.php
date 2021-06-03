{{-- 繼承模板 --}}
@extends('layouts/frameWithNav')

{{-- 此為模板中headadd部分 --}}
@section('headadd')
@endsection

{{-- 此為模板中content部分 --}}
@section('content')

    <div style="padding: 50px;">
        對應語言 : @lang('langtest.title') 

        <ul class="nav navbar-nav navbar-right">
            <li>修改語言:</li>
            <li class="dropdown">
                {{-- 目前語言 --}}
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                    {{ LaravelLocalization::getCurrentLocaleName() }} <span class="caret"></span>
                </a>
                {{-- 支持的語言選項,對應值參考 config/laravellocalization.php --}}
                <ul class="dropdown-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>

    




@endsection

