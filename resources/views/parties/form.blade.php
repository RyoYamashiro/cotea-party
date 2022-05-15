@csrf

<div class="title-wrapper">
  <h2 class="title">パーティー投稿作成</h2>
</div>

<div class="input-holder">
  <label class="form-label" for="title">タイトル</label>
  <input class="form-input" type="text" name="title" required value="{{ $party->title ?? old('title') }}">
</div>

<div class="input-holder">
  <label class="form-label" for="date">開催日時</label>
  <input class="form-input" type="datetime-local" name="date" required value="{{ $party->date->format('Y-m-d\TH:i') ?? old('date') }}">
</div>

{{logger($party->address ?? old('address') )}}
<div id="select_map">
  <SelectMap addressValue="{{ $party->address ?? old('address') }}" />
</div>

<div class="input-holder">
  <label class="form-label" for="shopname">開催場所店名</label>
  <input class="form-input" type="text" name="shopname" required value="{{ $party->shopname ?? old('shopname') }}">
</div>


<div class="input-holder">
  <label class="form-label" for="content">パーティー詳細説明</label>
  <textarea class="form-input" type="text" name="content" required rows="6">{{$party->content ?? old('content')}}</textarea>
</div>
