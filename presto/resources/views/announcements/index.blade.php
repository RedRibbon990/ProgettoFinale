<x-layout>

    <div id="fullpage">  
        <div class="section">
            <h1 class="display-2">{{__('ui.allAnnouncements')}}</h1>

            <div class="time-circle">

                <div class="sun"></div>
                <div class="moon">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="stars">
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="water"></div>
            </div>

            <div id="switch" onclick="toggleDayNight()">
                <span id="switchTextLeft" class="text">Day</span>
                <div id="circle"></div>
                <span id="switchTextRight" class="text">Night</span>
            </div>

            <div class="container">
                <div class="row">
                    @foreach ($announcements as $announcement)
                        <div class="col-12 col-md-4 my-4">
                            <div class="card shadow" style="width: 18rem">
                                <img src="https://picsum.photos/200" class="card-img-top p-3 rounded" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$announcement->title}}</h5>
                                    <p class="card-text">{{$announcement->body}}</p>
                                    <p class="card-text">{{$announcement->price}}</p>
                                    <a href="{{route('announcements.show', compact('announcement'))}}" class="btn btn-primary shadow">Visualizza</a>
                                    @if ($announcement->category !== null)
                                    <a href="{{ route('categoryShow', ['category' => $announcement->category])}}" class="my-2 border-top pt-2 border-dark card-link shadow btn btn-success">Categoria: {{ $announcement->category->name }}</a>
                                    @endif
                                    <p class="card-footer mt-3 mb-0 ">Pubblicato il: {{$announcement->created_at->format('d/m/Y')}} - Autore {{$announcement->user->name ?? ''}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{$announcements->links()}}
                </div>
            </div>
        </div>


</x-layout>
