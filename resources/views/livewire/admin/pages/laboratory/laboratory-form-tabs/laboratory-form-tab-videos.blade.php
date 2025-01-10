@foreach(\App\Models\Laboratory::VIDEOS as $video)
    <!--- {{ $video['name'] }} Field --->
    <div class="form-group">
        <label for="{{ $video['key'] }}">{{ $video['name'] }}</label>
        <select class="form-control @error('videos.' . $video['key']) is-invalid @enderror" wire:model="{{ 'videos.' . $video['key'] }}">
            <option value=""></option>
            @foreach($videoList as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        @error('videos.' . $video['key'])
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
@endforeach