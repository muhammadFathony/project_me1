<?php 
$sql = "UPDATE user_data AS ud JOIN user AS u ON ud.id = u.id SET ud.col1 = val1,ud.col2 = val2 WHERE ud.id = $id";
$this->db->query($sql); 
//ganti
$this->db->join('user_data', 'user.id = user_data.id');
$this->db->set($data);
$this->db->where('user_data.id',$id);
$this->db->update('user_data');
//ganti
public function update_model($id,array $data)
{
$uname=$data['uname'];
$email=$data['email'];
$password=$data['password'];
$address=$data['address'];
$mobilenumber=$data['Mobilenumber'];
$job=$data['Job'];

$query=
$this->db->set('user_data.email',$email);
$this->db->set('user.password',$password);
$this->db->set('user_data.mobilenumber',$mobilenumber);
$this->db->set('user_data.job',$job);
$this->db->set('user.uname',$uname);

$this->db->where('user_data.id',$id);
$this->db->where('user.id',$id);
$this->db->update('user_data JOIN user ON user_data.id= user.id');


return $query;
//ganti
$this->db->set('a.firstname', 'Pekka');
$this->db->set('a.lastname', 'Kuronen');
$this->db->set('b.companyname', 'Suomi Oy');
$this->db->set('b.companyaddress', 'Mannerheimtie 123, Helsinki Suomi');
$this->db->where('a.id', 1);
$this->db->join('table2 as b', 'a.id = b.id');
$this->db->update('table as a');
?>
