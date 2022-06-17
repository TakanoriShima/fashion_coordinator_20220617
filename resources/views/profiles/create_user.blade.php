@extends('layouts.app')
@section('title', 'マイページ')
@section('content')
    　<h1 class="mypage">マイページ</h1>
      <!--登録された情報も表示されまだ登録していない情報も登録できる、編集できるようにする-->
      <form action="/profiles" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
          <label for="inputNickname">ニックネーム</label>
          <input type="text" class="form-control" name="nickname" id="inputNickname" placeholder="ニックネーム" required="required">
        </div>
        <div class="form-group">
          <label for="inputBirthday">生年月日</label>
          <input type="date" class="form-control" name="birthday" id="inputBirthday" placeholder="◯/◯/◯" required="required">
        </div>
        <div class="form-group">
          <label for="inputHeight">身長</label>
          <input type="number" min="100" max="200" class="form-control" name="height" id="inputHeight" placeholder="〇〇cm" required="required">
        </div>
        <div class="form-group">
          <label for="inputPhonenumber">電話番号</label>
          <input type="tel" class="form-control" id="inputStyle" name="phone" placeholder="電話番号" required="required">
        </div>
        <div class="form-group">
          <label for="inputPhonenumber">ひとこと</label>
          <input type="text" class="form-control" id="inputMessage" name="comment" placeholder="お店の方へひとこと" required="required">
        </div>
        <button type="submit" class="btn btn-primary change">
          <a href="#">変更する</a></button>
      </form>
@endsection