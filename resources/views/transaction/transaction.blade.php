@extends('layouts.app')
@section('title', 'Transaction')

@section('content')

<link rel="stylesheet" href="{{ asset('css/styles.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
 <!-- Scripts -->
 <script src="{{ asset('js/app.js') }}" defer></script>
 <!-- Fonts -->
 <link rel="dns-prefetch" href="//fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

 <!-- Bootstrap CSS link -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
 <!-- Link to Poppins font -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">
 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css'>
 <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-brands/css/uicons-brands.css'>

<!-- CDN版のBootstrapとVue.jsを読み込み -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


 <!-- Font Awesome icons -->
 <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">


<div class="container">

    {{-- Sorting button --}}
    <div class="row auto align-items-center">
        <div class="col-auto">
          <div class="input-group">
            <span class="input-group-text" id="basic-addon1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg></span>
            <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="basic-addon1">
          </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
              const searchInput = document.querySelector('.form-control');
              const itemsToSearch = []; // 検索対象のアイテムのリストをここに追加

              searchInput.addEventListener('input', function() {
                const searchTerm = searchInput.value.toLowerCase();
                const results = [];

                for (const item of itemsToSearch) {
                  if (item.textContent.toLowerCase().includes(searchTerm)) {
                    results.push(item);
                  }
                }

                // 検索結果を表示するための処理を追加する

                // 例: 検索結果を表示するコード
                // results を使って結果を表示する処理を追加する
              });
            });
        </script>


        <div class="col-auto">
            <div class="form-group">
              <select class="form-control text-center fw-bold" id="exampleFormSelect1" style="background-color: #336699; color: #fff;">
                <option selected>Sort By</option>
                <option value="priceHtL">Price High to Low</option>
                  <option value="name">Name</option>
                  <option value="stock">Stock Few</option>
              </select>
            </div>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', function() {
          const selectElement = document.getElementById('exampleFormSelect1');
          const itemsToSort = []; // 並べ替え対象のアイテムのリストをここに追加

          selectElement.addEventListener('change', function() {
            const selectedValue = selectElement.value;

            if (selectedValue === 'priceHtL') {
              // 価格を高い順に並べ替える処理を追加する
            } else if (selectedValue === 'name') {
              // 名前順に並べ替える処理を追加する
            } else if (selectedValue === 'stock') {
              // 在庫が少ない順に並べ替える処理を追加する
            }

            // 並べ替えた結果を表示する処理を追加する
          });
        });
      </script>




    <div class="row">
        <table class="table table-hover align-middle border">
            <thead class="small">
                <tr>
                    <th>USER ID</th>
                    <th>STATUS</th>
                    <th>BRANCH ID</th>
                    <th>CART ID</th>
                    <th>DATE</th>
                    <th>PAID AMOUNT</th>
                    <th>DETAIL</th>
                </tr>

            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->user_id }}</td>
                        <td>{{ $transaction->status }}</td>
                        <td>{{ $transaction->branch_id }}</td>
                        <td>{{ $transaction->cart_id }}</td>
                        <td></td>
                        <td>{{ $transaction->paid_amount }}</td>
                        <td>
                            <div class="text-center col-xs-12">
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#test-modal-{{ $transaction->id }}" style="background-color: #6699cc; color: #fff;">
                                    <i class="fi fi-sr-rectangle-list"></i> {{ count($transaction->items) }} Items
                                </button>
                            </div>

                            {{-- <div id="test-modal" class="modal fade" tabindex="-1" aria-hidden="true"> --}}

                            <div id="test-modal-{{ $transaction->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ count($transaction->items) }} Items</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col-3"></th>
                                                        <th scope="col-3">item name</th>
                                                        <th scope="col-3">price</th>
                                                        <th scope="col-3">quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <!-- Iterate through the transaction items -->
                                                @foreach ($transaction->items as $item)
                                                    <tr>
                                                        <td><img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}" width="50"></td>
                                                        <td>{{ $item->name }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Back</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

<div class="row mt-5">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="{{ $transactions->previousPageUrl() }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($page = 1; $page <= $transactions->lastPage(); $page++)
                <li class="page-item {{ $page == $transactions->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $transactions->url($page) }}">{{ $page }}</a>
                </li>
            @endfor
            <li class="page-item">
                <a class="page-link" href="{{ $transactions->nextPageUrl() }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<script>
    $(document).ready(function () {
        // ページネーション要素を取得
        var pagination = $('#pagination');
        // ページネーションリンクがクリックされたときの処理
        pagination.on('click', 'li.page-item a.page-link', function (e) {
            e.preventDefault(); // リンクのデフォルト動作を無効化
            var targetPage = $(this).text(); // クリックされたページ番号を取得
            // Previousボタンがクリックされた場合
            if ($(this).attr('aria-label') === 'Previous') {
                // 前のページに移動する処理をここに記述
            }
            // Nextボタンがクリックされた場合
            else if ($(this).attr('aria-label') === 'Next') {
                // 次のページに移動する処理をここに記述
            }
            // ページ番号がクリックされた場合
            /* else {
                // クリックされたページに移動する処理をここに記述
                // targetPageにクリックされたページ番号が格納されています
                // 例: クリックされたページが3なら、アイテムの表示を10件から20件までに更新するなど
            } */
        });
    });
</script> 
@endsection
