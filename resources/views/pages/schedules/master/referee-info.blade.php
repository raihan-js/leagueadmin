<h5>Title: {{ $masterSchedule->title }}</h5>
<h6>{{ $masterSchedule->homeTeam->name }} vs {{ $masterSchedule->awayTeam->name }}</h6>
<p>Date: {{ $masterSchedule->date }}</p>

<h6 class="card-subtitle mb-2 text-muted">Primary Referees:</h6>
<ul>
    @foreach ($primaryReferees as $referee)
        <li>{{ $referee->name }}</li>
    @endforeach
</ul>

<h6 class="card-subtitle mb-2 text-muted">Secondary Referees:</h6>
<ul>
    @foreach ($secondaryReferees as $referee)
        <li>{{ $referee->name }}</li>
    @endforeach
</ul>
