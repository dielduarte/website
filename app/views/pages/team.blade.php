@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Equipe</h2>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-2 text-center">
                <h2>Luiz Felipe Pedone</h2>
                <p>Fundador do site e Programador</p>
                <img class="img img-responsive img-circle" src="{{ URL::to('/') }}/img/equipe/luiz-felipe-pedone.jpg">
                <p class="about">Programador e usuário regular das linhas 9209, 1207 e 4195</p>
                <p>
                    <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/luizpedone">
                        <i class="fa fa-facebook-square fa-2x"></i>
                    </a>
                    <a class="btn btn-twitter" target="_blank" href="http://twitter.com/luizpedone">
                        <i class="fa fa-twitter-square fa-2x"></i>
                    </a>
                </p>
            </div>
            <div class="col-sm-4 text-center">
                <h2>Douglas Silva Pereira</h2>
                <p>Social Mídia</p>
                <img class="img img-responsive img-circle" src="{{ URL::to('/') }}/img/equipe/douglas-silva-pereira.jpg">
                <p class="about">Jornalista e usuário regular das linhas 3150, s33 e 1140</p>
                <p>
                    <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/silva.51.pereira">
                        <i class="fa fa-facebook-square fa-2x"></i>
                    </a>
                    <a class="btn btn-twitter" target="_blank" href="http://twitter.com/uaiteve">
                        <i class="fa fa-twitter-square fa-2x"></i>
                    </a>
                </p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2>Quero Colaborar?</h2>
                    <p><a href="{{ URL::to('/') }}/contato">Entre em contato!</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@stop