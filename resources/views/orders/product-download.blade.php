<table>
    <tr>
        <td colspan="12">✍・印の箇所が不備の場合は保留にさせて頂きます。</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td rowspan="2" colspan="12">特殊電装システム<br>           設計依頼書</td>
        <td>営　業　所</td>
        <td>所　長　印</td>
        <td>担　当　名</td>
    </tr>
    <tr>
        <td></td>
        <td>✍</td>
        <td>印鑑は不可</td>
    </tr>
    <tr>
        <td colspan="15">工事名：</td>
    </tr>
    <tr>
        <td colspan="15">現場進捗状況：</td>
    </tr>
    <tr>
        <td colspan="9">受注番号</td>
        <td colspan="2">設　計　依　頼　日</td>
        <td>年</td>
        <td>月</td>
        <td colspan="2">日</td>
    </tr>
    <tr>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td rowspan="2"></td>
        <td colspan="2">希望回答　納期</td>
        <td>年</td>
        <td>月</td>
        <td colspan="2">日</td>
    </tr>
    <tr>
        <td colspan="2">取　付　予　定　日</td>
        <td>年</td>
        <td>月</td>
        <td colspan="2">日</td>
    </tr>
    <tr>
        <td colspan="2">符号</td>
        <td colspan="5">製品名</td>
        <td colspan="2">数量</td>
        <td>開口寸法</td>
        <td colspan="5">開口寸法</td>
    </tr>
    @foreach($QuotationDetails as $key => $value)
        <tr>
            <td rowspan="2" colspan="2">{{($key + 1)}}</td>
            <td rowspan="2" colspan="5">{{$value->ItemName}}</td>
            <td rowspan="2" colspan="2">{{$value->Q}}</td>
            <td>{{$value->W}}</td>
            <td rowspan="2" colspan="5"> {{$value->W . 'X' .$value->H}} m2</td>
        </tr>
        <tr>
            <td>{{$value->H}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="13">動作条件（出来る限り詳細に記入して下さい）</td>
        <td rowspan="2" colspan="2">初回作図年月<br>年月</td>
    </tr>
    <tr>
        <td colspan="13"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="15"></td>
    </tr>
    <tr>
        <td colspan="12"></td>
        <td>受付日</td>
        <td>担当</td>
        <td>完了日</td>
    </tr>
    <tr>
        <td colspan="12"></td>
        <td rowspan="5"></td>
        <td rowspan="5"></td>
        <td rowspan="5"></td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
    <tr>
        <td colspan="12">添付資料が有りましたら施工図課に同送して下さい。</td>
    </tr>
    <tr>
        <td colspan="12"></td>
    </tr>
</table>
