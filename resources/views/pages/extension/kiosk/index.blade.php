@extends('layouts.kiosk')

@section('content')
    <div class="h-screen flex items-center justify-center gap-4 md:gap-10">
        @foreach ($value as $va)
            @php
                if ($va['cvalue_type'] == 'get') {
                    $typelink = 'target="_blank"';
                } else {
                    $typelink = '';
                }
            @endphp

            <a href="{{ url('/') . $va['cvalue_link'] . '/' . $va['cvalue_prefix'] }}">
                <div class="relative flex flex-col text-gray-700 bg-white shadow-md w-96 rounded-xl bg-clip-border">
                    <div class="relative h-auto mx-4 -mt-6 overflow-hidden text-white shadow-lg rounded-xl bg-blue-gray-500 bg-clip-border shadow-blue-gray-500/40">
                        <img src="{{ asset($va['cvalue_image']) }}" alt="img-blur-shadow" layout="fill"/>
                    </div>
                    <div class="p-6">
                        <h5 class="block mb-2 font-sans text-xl antialiased font-bold leading-snug tracking-normal text-blue-gray-900 uppercase text-center">
                            {{ $va['cvalue_name'] }}
                        </h5>

                        <p class="block font-sans text-base text-justify antialiased font-light leading-relaxed text-inherit">
                            <?php echo sprintf($va['cvalue_desc']); ?>
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
