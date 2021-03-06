@csrf


<div class="input-holder">
  <label class="form-label" for="title">タイトル</label>
  <input class="form-input" type="text" name="title" required value="{{ $party->title ?? old('title') }}">
</div>
@if ($errors->has('title'))
<p class="error-msg">
  {{$errors->first('title')}}
</p>
@endif


<div class="input-holder">
  <label class="form-label" for="date">開催日時</label>
  <input class="form-input" type="datetime-local" name="date" required value="{{$party ? date('Y-m-d\TH:i', strtotime($party->date)) : old('date') }}">
</div>
@if ($errors->has('date'))
<p class="error-msg">
  {{$errors->first('date')}}
</p>
@endif

<div id="select_map" data-address="{{ $party->address ?? old('address') }}" data-lat="{{ $party->lat ?? null  }}" data-lng="{{ $party->lng ?? null }}">
</div>
@if ($errors->has('address'))
<p class="error-msg">
  {{$errors->first('address')}}
</p>
@endif


<div class="input-holder">
  <label class="form-label" for="shopname">開催場所店名</label>
  <input class="form-input" type="text" name="shopname" required value="{{ $party->shopname ?? old('shopname') }}">
</div>
@if ($errors->has('shopname'))
<p class="error-msg">
  {{$errors->first('shopname')}}
</p>
@endif


<div class="input-holder">
  <label class="form-label" for="content">パーティー詳細説明</label>
  <textarea class="form-input" type="text" name="content" required rows="6">{{$party->content ?? old('content')}}</textarea>
</div>
@if ($errors->has('content'))
<p class="error-msg">
  {{$errors->first('content')}}
</p>
@endif
