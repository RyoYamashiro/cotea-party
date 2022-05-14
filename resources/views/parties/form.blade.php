@csrf

<div class="title-wrapper">
  <h2 class="title">パーティー投稿作成</h2>
</div>

<div class="input-holder">
  <label class="form-label" for="title">タイトル</label>
  <input class="form-input" type="text" name="title" required value="{{ old('title') }}">
</div>

<div class="input-holder">
  <label class="form-label" for="date">開催日時</label>
  <input class="form-input" type="datetime-local" name="date" required value="{{ old('date') }}">
</div>

<div class="input-holder">
  <label class="form-label" for="map">開催場所地図</label>
  <div class="party-middle-map">
  </div>
</div>
<div class="input-holder">
  <label class="form-label" for="address">開催場所住所(地図ピン留めしたら自動入力)</label>
  <input class="form-input" type="text" name="address" required value="{{ old('address') }}">
</div>
<div class="input-holder">
  <label class="form-label" for="shopname">開催場所店名</label>
  <input class="form-input" type="text" name="shopname" required value="{{ old('shopname') }}">
</div>



<div class="input-holder">
  <label class="form-label" for="content">パーティー詳細説明</label>
  <textarea class="form-input" type="text" name="content" required rows="6">{{old('content')}}</textarea>
</div>
