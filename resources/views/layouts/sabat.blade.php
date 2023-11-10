<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/sweetalert.js') }}"></script>
    <script defer src="{{ asset('asset/js/alpinejs@3.13.1.js') }}"></script>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>

<body>
    <div class="flex flex-col h-screen">
        <!--  start::navbar   -->
        <nav class="flex bg-white h-16 px-2 items-center">
            <div class="w-4/6 flex items-center">
                <img class="h-10 object-cover" src="{{ asset('asset/image/about/prog-1.png') }}" alt="Store Logo">

                <div class="mx-3 font-bold">RSU INDO SEHAT</div>

                <button onclick="toggleSidebar()" type="button" class="text-gray-800 hover:bg-gray-800 hover:text-white font-semibold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 uppercase">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-ul" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm-3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm0 4a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                    </svg>
                    Menu
                </button>
            </div>
            <div class="w-2/6 flex justify-end items-center">
                @php
                    $imurl = "https://ui-avatars.com/api/?name=" . strtr(auth()->user()->name, " ", "+") . "&size=128&background=ff4433&color=fff";
                @endphp

                <img src="{{ $imurl }}" class="w-7 w-7 rounded-full" alt="Profile">
                <span class="ml-3">{{ auth()->user()->name }}</span>
                <span class="mx-3">|</span>

                <button type="button" id="btnout" class="font-medium rounded-lg px-5 py-2.5 text-center inline-flex items-center mr-2">
                    <svg class="fill-current h-5 w-5 mr-2 mt-0.5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1"  width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10,17V14H3V10H10V7L15,12L10,17M10,2H19A2,2 0 0,1 21,4V20A2,2 0 0,1 19,22H10A2,2 0 0,1 8,20V18H10V20H19V4H10V6H8V4A2,2 0 0,1 10,2Z" />
                    </svg>

                    Keluar
                </button>
            </div>
        </nav>

        {{-- <div class="flex bg-pink-300 h-8 items-center">Full Width Subheader </div> --}}

        <!--  end::navbar   -->
        <div class="flex flex-1 overflow-hidden">
            <!--   start::Sidebar    -->
            <aside class="hidden sm:block bg-white w-64 overflow-y-auto">
                <div class="flex overflow-hidden">
                    <div class="hidden md:flex md:flex-shrink-0">
                        <div class="flex flex-col w-64">
                            <div class="flex flex-col flex-grow px-4">
                                <nav class="flex-1 space-y-1">
                                    <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                        Analytics
                                    </p>
                                    <ul>
                                        <li>
                                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500" href="#">
                                                <ion-icon class="w-4 h-4 md hydrated" name="aperture-outline" role="img" aria-label="aperture outline"></ion-icon>
                                                <span class="ml-4">
                                                    Dashboard
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="inline-flex items-center w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500" href="#">
                                                <ion-icon class="w-4 h-4 md hydrated" name="trending-up-outline" role="img" aria-label="trending up outline"></ion-icon>
                                                <span class="ml-4">
                                                    Performance
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <p class="px-4 pt-4 text-xs font-semibold text-gray-400 uppercase">
                                        Customization
                                    </p>
                                    <ul>
                                        <li>
                                            <div x-data="{ open: false }">
                                                <button class="inline-flex items-center justify-between w-full px-4 py-2 mt-1 text-sm text-gray-500 transition duration-200 ease-in-out transform rounded-lg focus:shadow-outline hover:bg-gray-100 hover:scale-95 hover:text-blue-500 group" @click="open = ! open">
                                                    <span class="inline-flex items-center text-base font-light">
                                                        <ion-icon class="w-4 h-4 md hydrated" name="home-outline" role="img" aria-label="home outline"></ion-icon>
                                                        <span class="ml-4">
                                                            Home
                                                        </span>
                                                    </span>
                                                    <svg fill="currentColor" viewBox="0 0 20 20" :class="{'rotate-180': open, 'rotate-0': !open}" class="inline w-5 h-5 ml-auto transition-transform duration-200 transform group-hover:text-accent rotate-0">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                                <div class="p-2 pl-6 -px-px" x-show="open" @click.outside="open = false" style="display: none;">
                                                    <ul>
                                                        <li>
                                                            <a href="#" title="#" class="inline-flex items-center w-full p-2 pl-3 text-sm font-light text-gray-500 rounded-lg hover:text-blue-500 group hover:bg-gray-50">
                                                                <span class="inline-flex items-center w-full">
                                                                    <ion-icon class="w-4 h-4 md hydrated" name="document-outline" role="img" aria-label="document outline"></ion-icon>
                                                                    <span class="ml-4">
                                                                        Guides
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#" title="#" class="inline-flex items-center w-full p-2 pl-3 text-sm font-light text-gray-500 rounded-lg hover:text-blue-500 group hover:bg-gray-50">
                                                                <span class="inline-flex items-center w-full">
                                                                    <ion-icon class="w-4 h-4 md hydrated" name="mail-outline" role="img" aria-label="mail outline"></ion-icon>
                                                                    <span class="ml-4">
                                                                        Email
                                                                    </span>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <!--   end::Sidebar    -->
            <!--   start::Main Content     -->
            <main class="flex flex-1 bg-blue-300 overflow-y-auto paragraph px-4">
                <!--    text set from JS file  -->
            </main>
            <!--   end::Main Content     -->
        </div>

        {{-- <div class="flex bg-yellow-300">Footer</div> --}}
    </div>

    <script>
        function toggleSidebar() {
            const aside = document.querySelector('aside')
            aside.classList.toggle("sm:hidden")
            aside.classList.toggle("hidden")
        }

        const main = document.querySelector('main')
        main.innerText =
            "Creative Writing Generating random paragraphs can be an excellent way for writers to get their creative flow going at the beginning of the day. The writer has no idea what topic the random paragraph will be about when it appears. This forces the writer to use creativity to complete one of three common writing challenges. The writer can use the paragraph as the first one of a short story and build upon it. A second option is to use the random paragraph somewhere in a short story they create. The third option is to have the random paragraph be the ending paragraph in a short story. No matter which of these challenges is undertaken, the writer is forced to use creativity to incorporate the paragraph into their writing. Tackle Writers' Block A random paragraph can also be an excellent way for a writer to tackle writers' block. Writing block can often happen due to being stuck with a current project that the writer is trying to complete. By inserting a completely random paragraph from which to begin, it can take down some of the issues that may have been causing the writers' block in the first place. Beginning Writing Routine Another productive way to use this tool to begin a daily writing routine. One way is to generate a random paragraph with the intention to try to rewrite it while still keeping the original meaning. The purpose here is to just get the writing started so that when the writer goes onto their day's writing projects, words are already flowing from their fingers. Writing Challenge Another writing challenge can be to take the individual sentences in the random paragraph and incorporate a single sentence from that into a new paragraph to create a short story. Unlike the random sentence generator, the sentences from the random paragraph will have some connection to one another so it will be a bit different. You also won't know exactly how many sentences will appear in the random paragraph. Creative Writing Generating random paragraphs can be an excellent way for writers to get their creative flow going at the beginning of the day. The writer has no idea what topic the random paragraph will be about when it appears. This forces the writer to use creativity to complete one of three common writing challenges. The writer can use the paragraph as the first one of a short story and build upon it. A second option is to use the random paragraph somewhere in a short story they create. The third option is to have the random paragraph be the ending paragraph in a short story. No matter which of these challenges is undertaken, the writer is forced to use creativity to incorporate the paragraph into their writing. Tackle Writers' Block A random paragraph can also be an excellent way for a writer to tackle writers' block. Writing block can often happen due to being stuck with a current project that the writer is trying to complete. By inserting a completely random paragraph from which to begin, it can take down some of the issues that may have been causing the writers' block in the first place. Beginning Writing Routine Another productive way to use this tool to begin a daily writing routine. One way is to generate a random paragraph with the intention to try to rewrite it while still keeping the original meaning. The purpose here is to just get the writing started so that when the writer goes onto their day's writing projects, words are already flowing from their fingers. Writing Challenge Another writing challenge can be to take the individual sentences in the random paragraph and incorporate a single sentence from that into a new paragraph to create a short story. Unlike the random sentence generator, the sentences from the random paragraph will have some connection to one another so it will be a bit different. You also won't know exactly how many sentences will appear in the random paragraph. Creative Writing Generating random paragraphs can be an excellent way for writers to get their creative flow going at the beginning of the day. The writer has no idea what topic the random paragraph will be about when it appears. This forces the writer to use creativity to complete one of three common writing challenges. The writer can use the paragraph as the first one of a short story and build upon it. A second option is to use the random paragraph somewhere in a short story they create. The third option is to have the random paragraph be the ending paragraph in a short story. No matter which of these challenges is undertaken, the writer is forced to use creativity to incorporate the paragraph into their writing. Tackle Writers' Block A random paragraph can also be an excellent way for a writer to tackle writers' block. Writing block can often happen due to being stuck with a current project that the writer is trying to complete. By inserting a completely random paragraph from which to begin, it can take down some of the issues that may have been causing the writers' block in the first place. Beginning Writing Routine Another productive way to use this tool to begin a daily writing routine. One way is to generate a random paragraph with the intention to try to rewrite it while still keeping the original meaning. The purpose here is to just get the writing started so that when the writer goes onto their day's writing projects, words are already flowing from their fingers. Writing Challenge Another writing challenge can be to take the individual sentences in the random paragraph and incorporate a single sentence from that into a new paragraph to create a short story. Unlike the random sentence generator, the sentences from the random paragraph will have some connection to one another so it will be a bit different. You also won't know exactly how many sentences will appear in the random paragraph."
    </script>

    <script>
        $('#btnout').on('click', function () {
            Swal.fire({
                title: 'Kamu yakin ?',
                text: "Akan keluar dari aplikasi ini",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Keluar',
                cancelButtonText: 'Batal',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('authout') }}";
                }
            })
        });
    </script>
</body>

</html>
