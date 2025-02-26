<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Jenis</th>
        <th>hostname</th>
        <th>Merk</th>
        <th>Processor</th>
        <th>Tanggal Pembelian</th>
        <th>Ram</th>
        <th>Grafik</th>
        <th>Hardisk</th>
        <th>SSD</th>
        <th>OS</th>
        <th>Office</th>
        <th>Akun Office</th>
        <th>Legal OS</th>
        <th>Internet</th>
        <th>IP Address</th>
        <th>AMP</th>
        <th>Umbrella</th>
        <th>Anydesk ID</th>
    </tr>
    </thead>
    <tbody>
    @foreach($export as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->name }}</td>
            <td>{{ $item->jenis }}</td>
            <td>{{ $item->hostname }}</td>
            <td>{{ $item->merk }}</td>
            <td>{{ $item->processor }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->ram }}</td>
            <td>{{ $item->grafik }}</td>
            <td>{{ $item->hardisk }}</td>
            <td>{{ $item->ssd }}</td>
            <td>{{ $item->os }}</td>
            <td>{{ $item->Office }}</td>
            <td>{{ $item->akunOffice }}</td>
            <td>{{ $item->legalos }}</td>
            <td>{{ $item->internet }}</td>
            <td>{{ $item->ipaddress }}</td>
            <td>{{ $item->amp }}</td>
            <td>{{ $item->umbrella }}</td>
            <td>{{ $item->anydeskid }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
