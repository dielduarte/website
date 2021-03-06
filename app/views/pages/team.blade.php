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
            <div class="col-sm-4 text-center">
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
                <h2>Victor Lambertucci</h2>
                <p>Designer</p>
                <img class="img img-responsive img-circle" src="{{ URL::to('/') }}/img/equipe/victor-lambertucci.jpg">
                <p class="about">Designer gráfico e estudante de Jornalismo na UFMG. Usuário regular das linhas 50, 9550, 503 e 504</p>
                <p>
                    <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/victor.lambertucci">
                        <i class="fa fa-facebook-square fa-2x"></i>
                    </a>
                    <a class="btn btn-twitter" target="_blank" href="https://twitter.com/vlambertucci">
                        <i class="fa fa-twitter-square fa-2x"></i>
                    </a>
                </p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2>Quer Colaborar?</h2>
                        <p><a href="{{ URL::to('/') }}/contato">Entre em contato!</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop
