<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('kategori_id') ? 'has-error' : ''}}">
            {!! Form::label('kategori_id', 'Kategory Id', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::select('kategori_id',$kategori, null, ['class' => 'form-control']) !!}
                {!! $errors->first('kategori_id', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('nama') ? 'has-error' : ''}}">
            {!! Form::label('nama', 'Title', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('nama', null, ['class' => 'form-control']) !!}
                {!! $errors->first('nama', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="form-group {{ $errors->has('lat') ? 'has-error' : ''}}">
            {!! Form::label('lat', 'Lat', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('lat', null, ['class' => 'form-control','id'=>'lat']) !!}
                {!! $errors->first('lat', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('long') ? 'has-error' : ''}}">
            {!! Form::label('long', 'Long', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('long', null, ['class' => 'form-control','id'=>'long']) !!}
                {!! $errors->first('long', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div id="map"></div>
    </div>
</div>

<!-- <div class="form-group {{ $errors->has('upload') ? 'has-error' : ''}}">
    {!! Form::label('upload', 'Upload', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('upload', null, ['class' => 'form-control']) !!}
        {!! $errors->first('upload', '<p class="help-block">:message</p>') !!}
    </div>
</div> -->


<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        <a class="btn btn-default" href="{{ route('map')}}" role="button">Back</a>
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>


@push('js')
<script>
    var map = new GMaps({
      el: '#map',
      zoom: 10,
      lat: -7.5812427,
      lng: 111.9081293,
      click: function(e) {
        // alert('click');
        var latLng = e.latLng;
        console.log(latLng);
        var lat = $('#lat');
        var long = $('#long');

        lat.val(latLng.lat());
        long.val(latLng.lng());
        map.removeMarkers();
        map.addMarker({
            lat: latLng.lat(),
            lng: latLng.lng(),
            title: 'Create Here',
            click: function(e) {
                alert('You clicked in this marker');
            }
        });

    },
});
</script>
@endpush