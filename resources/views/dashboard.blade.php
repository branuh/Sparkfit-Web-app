@extends('layouts.app')

@section('title', 'Dashboard')
@section('subtitle', 'Your four pillars at a glance')

@push('styles')
<style>
  /* Dimmed gym picture behind the page */
  body::before {
    content: '';
    position: fixed;
    inset: 0;
    z-index: -1;
    background:
      linear-gradient(rgba(248, 245, 255, 0.82), rgba(248, 245, 255, 0.82)),
      url('{{ asset('assets/images/gym-hero.svg') }}') center / cover no-repeat;
  }
</style>
@endpush

@section('content')
  <div class="card p-4 border-light shadow-sm text-center">
    <h3 class="mb-2">Welcome to SparkFit</h3>
    <p class="text-muted-green mb-0">Your pillar cards, avatar and charts will appear here.</p>
  </div>
@endsection