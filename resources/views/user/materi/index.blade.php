@extends('layouts.app_user')

@section('title', 'Materi')

@section('content')
<header>
    <div class="header">
        <h1>Materi Untuk {{ $modul->nama_program_studi }}</h1> <!-- Display the program study name -->
    </div>
</header>

<div class="containerxx">
    <div class="row mb-3">
        <div class="col-md-12">
            <form action="{{ route('materi.index') }}" method="GET"></form>
        </div>
    </div>
    <div class="card-listxx">
        @if($materis->isEmpty())
            <div class="no-modules">
                <p>Modul belum ada yang diupload.</p>
            </div>
        @else
            @foreach($materis as $item)
                <div class="cardxx">
                    <div class="card-headerxx">
                        <span class="tag">{{ $item->modul_pembelajaran }} →
                            {{ $item->programStudi->nama_program_studi }}</span>
                    </div>
                    <div class="card-bodyxx">
                        <h2>{{ $item->judul_materi }}</h2>
                        <p></p>
                    </div>
                    <hr class="garis">
                    <div class="card-footerxx">
                        <span class="date">{{ $item->created_at->format('d M Y') }}</span>
                        <a href="{{ route('materi.show', $item->id_modul) }}" class="read-more">Lihat Modul →</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection


<style>
    
.card-listxxx {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
  
  font-family: "Century Gothic", sans-serif;
}

.cardxxx {
  
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 10px;
  overflow: hidden;
  width: calc(33.333% - 20px);
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  -webkit-border-radius: 10px;
  -moz-border-radius: 10px;
  -ms-border-radius: 10px;
  -o-border-radius: 10px;
}

.card-headerxxx {
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.tag {
  background-color: #007bff;
  color: #fff;
  padding: 5px 10px;
  border-radius: 4px;
  font-size: 14px;
  text-transform: uppercase;
  font-weight: bold;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  -ms-border-radius: 4px;
  -o-border-radius: 4px;
}

.card-bodyxxx {
  
  padding: 10px;
}

.card-bodyxxx h2 {
  margin: 0 0 10px;
  font-size: 18px;
  font-weight: bold;
}

.card-bodyxxx p {
  margin: 0;
  color: #666;
}

.card-footerxxx {
  padding: 10px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}
    
@media (max-width: 1200px) {
    .cardxxx {
        margin-bottom: 10px; /* Adjust the space between cards */
    }
    .card-listxxx {
        padding-bottom: 100px; /* Increase the padding at the bottom */
    }
}

@media (max-width: 768px) {
    .cardxxx {
        width: 100%;
    }
    .card-listxxx {
        padding-bottom: 100px; /* Increase the padding at the bottom */
    }
}

@media (max-width: 400px) {
    .cardxxx {
        width: 100%;
    }
    .card-listxxx {
        padding-bottom: 100px; /* Increase the padding at the bottom */
    }
}

    
</style>