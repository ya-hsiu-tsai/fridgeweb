<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('愛心冰箱整合地圖') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!--<a href="{{ route('addfridge') }}">新增冰箱</a><br>-->
                    <?php
                    $pdo = new PDO('mysql:host=mysql; dbname=fridgeweb; charset=utf8', 'sail', 'password');
                    $sql = $pdo->prepare('select * from fridge where users_id=?');
                    $sql->execute([Auth::user()->id]);
                    echo '我的冰箱<br>';
                    echo '<table>';
                    echo '<th>冰箱名稱</th><th>地點</th>';
                    $c = 0;
                    foreach($sql->fetchAll() as $row)
                    {
                        $c++;
                        echo '<tr>';
                        echo '<td>';
                        echo '<a href="userfridgedetail.blade.php?id=', $row['id'], '">', $row['name'], '</a>';
                        echo '</td>';
                        echo '<td>', $row['address'], '</td>';
                        echo '</tr>';
                    }
                    if($c == 0)
                        echo '<tr><td colspan="3">目前還沒有冰箱</td></tr>';
                    echo '</table>';
                    ?>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
