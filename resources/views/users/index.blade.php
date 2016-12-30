@foreach ($users as $key => $user)
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Company</th>
      </tr>
    </thead>
    <tr>
      <th>{{ $user->fullName() }}</th>
      <th>{{ $user->email }}</th>
      <th>Role</th>
      <th>Company</th>
    </tr>
  </table>
@endforeach
