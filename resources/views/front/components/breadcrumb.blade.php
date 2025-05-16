<!-- ========================  Main header ======================== -->
<section class="main-header" @if(isset($bg_img)) style="background-image:url({{ $bg_img }})" @endif>
    <header>
        <div class="container {{ isset($alignment_class)? $alignment_class : '' }}">
            @if(isset($title))
                <h2 class="h2 title">{{ $title }}</h2>
            @endif
            <ol class="breadcrumb breadcrumb-inverted">
                <li><a href="index.html"><span class="icon icon-home"></span></a></li>
                @if(isset($li_1))
                <li><a class="active" href="login.html">{{ $li_1 }}</a></li>
                @endif
                @if(isset($li_2))
                    <li><a class="active" href="login.html">{{ $li_2 }}</a></li>
                @endif
            </ol>
        </div>
    </header>
</section>
