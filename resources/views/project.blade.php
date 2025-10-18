@extends('layouts.app')
@section('content')
<section class="pt-12 md:pt-20 pb-4 md:pb-6 bg-transparent">
    <div class="container max-w-6xl mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-extrabold text-center text-white mb-8 tracking-tight">My Projects</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 mb-0">
            <!-- Card 1 -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-700 dark:from-gray-800 dark:to-gray-700 shadow-xl rounded-2xl p-8 flex flex-col items-center transition-transform hover:-translate-y-2 hover:shadow-2xl border border-gray-700">
                <div class="w-16 h-16 flex items-center justify-center bg-gray-900 dark:bg-gray-800 rounded-full mb-6 shadow-lg">
                    <i data-feather="activity" class="text-indigo-400 w-8 h-8"></i>
                </div>
                <h4 class="font-semibold text-xl text-white mb-3">High Experience</h4>
                <p class="text-gray-300 text-center">Years of hands-on experience in building scalable, robust, and modern web applications using the latest technologies.</p>
            </div>
            <!-- Card 2 -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-700 dark:from-gray-800 dark:to-gray-700 shadow-xl rounded-2xl p-8 flex flex-col items-center transition-transform hover:-translate-y-2 hover:shadow-2xl border border-gray-700">
                <div class="w-16 h-16 flex items-center justify-center bg-gray-900 dark:bg-gray-800 rounded-full mb-6 shadow-lg">
                    <i data-feather="codesandbox" class="text-pink-400 w-8 h-8"></i>
                </div>
                <h4 class="font-semibold text-xl text-white mb-3">Useful Sandboxes</h4>
                <p class="text-gray-300 text-center">Created interactive sandboxes and demos to showcase features, test ideas, and accelerate development workflows.</p>
            </div>
            <!-- Card 3 -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-700 dark:from-gray-800 dark:to-gray-700 shadow-xl rounded-2xl p-8 flex flex-col items-center transition-transform hover:-translate-y-2 hover:shadow-2xl border border-gray-700">
                <div class="w-16 h-16 flex items-center justify-center bg-gray-900 dark:bg-gray-800 rounded-full mb-6 shadow-lg">
                    <i data-feather="coffee" class="text-yellow-400 w-8 h-8"></i>
                </div>
                <h4 class="font-semibold text-xl text-white mb-3">Success Side Projects</h4>
                <p class="text-gray-300 text-center">Launched and maintained successful side projects, demonstrating creativity, persistence, and a passion for technology.</p>
            </div>
        </div>
    </div>
</section>
@push('scripts')
<script>
    if (window.feather) {
        window.feather.replace();
    }
</script>
@endpush
@endsection