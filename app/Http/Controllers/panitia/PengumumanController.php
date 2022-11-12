<?php

namespace App\Http\Controllers\panitia;
use App\Pengumuman;
use App\Pendaftaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PengumumanController extends Controller
{
    //
    public function index(){
    
   //membawa data pengumuman yang di join dengan table calon_siswa
   $pengumuman = DB::table('pengumuman')
        ->join('calon_siswa', 'calon_siswa.id', '=', 'pengumuman.calon_siswa_id')
        ->join('users', 'users.id', '=', 'calon_siswa.panitia_id')
        ->select('pengumuman.*', 'calon_siswa.nama_siswa','calon_siswa.email','calon_siswa.no_tlp','users.name as nama_panitia')
        ->get();
    $data = array(
    
    'pengumuman' => $pengumuman
    );
// dd($data);
    return view('panitia.data_pengumuman.index',$data);
    }
    public function tambah(){
        //membuat kode PGN pada tabel Pengumuman
        $siswa = Pengumuman::all();
        $q = DB::table('pengumuman')->select(DB::raw('MAX(RIGHT(kode_pgn,4)) as kode'));
        $kd = "";
        if($q->count()>0)
        {
         foreach($q->get() as $k)
         {
             $tmp = ((int)$k->kode)+1;
             $kd = sprintf("%04s", $tmp);
         }
        }
        else
        {
         $kd = "0001";
        }
        $pendaftaran = DB::table('calon_siswa')
        ->join('jurusan', 'jurusan.id', '=', 'calon_siswa.jurusan_id')
        ->join('users', 'users.id', '=', 'calon_siswa.user_id')
        ->select('calon_siswa.*', 'jurusan.nama as nama_jurusan', 'users.name')
        ->where('calon_siswa.status','Di seleksi')
        ->get();
        $data = array(
            'pendaftaran' => $pendaftaran,
            'pengumuman' => $kd
        );
//dd($data);
    return view('panitia.data_pengumuman.tambah',$data, compact('kd'));
    }
//menyimpan Data Pengumuman ke DB
    public function store(Request $request){
       
       Pengumuman :: create([
        'kode_pgn' => $request->kode_pgn,
        'calon_siswa_id' => $request->calon_siswa_id,
        'judul_pengumuman' => $request->judul_pengumuman,
        'deskripsi' => $request->deskripsi,
        'status' => $request->status
       ]);
       return redirect()->route('panitia.pengumuman')->with('success', 'Berhasil Menambahkan Pengumuman');
       }
    public function pesan($id,Request $request){
        
        $pengumuman = DB::table('pengumuman')
        ->join('calon_siswa', 'calon_siswa.id', '=', 'pengumuman.calon_siswa_id')
        ->select('pengumuman.*', 'calon_siswa.nama_siswa','calon_siswa.email','calon_siswa.no_tlp')
        ->where('pengumuman.id',$id)
        ->get();
        $data = array(
            'pengumuman' => $pengumuman
        );
        // $pn = Pengumuman::findOrFail($id);
        // $pengumuman[0]->nama_siswa;
    //dd($data);
        $subject = "Contact dari : Panitia SMK Negeri 3 Sorong";
        $name =  $pengumuman[0]->nama_siswa;
        $emailAddress =  $pengumuman[0]->email;
        $message = $request->input('message');
//dd($pengumuman[0]);
        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
           // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'papuauser27@gmail.com';                 // SMTP username
            $mail->Password = 'wngzjlzduifyvmok';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            // Sender
            $mail->setFrom("papuauser27@gmail.com", "Panitia SMK N.3 Sorong");

            // who will receive the email submission
            $mail->addAddress($pengumuman[0]->email);     // Add a recipient
            // $mail->addAddress('ellen@example.com');               // Name is optional


            $mail->addReplyTo( $pengumuman[0]->email, $pengumuman[0]->nama_siswa);
            
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');

            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name


            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = preg_replace('/\[\]/','',$message);
          

            $mail->send();
            $request->session()->flash('status', 'Terima kasih, kami sudah menerima email anda.');
            //return view('panitia.data_pengumuman.data_pesan');
            

        } catch (Exception $e) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
       

    return view('panitia.data_pengumuman.data_pesan',$data)->with('success', 'Berhasil Mengirimkan Email');
    }
    public function data_pesan(){
    
        $pengumuman = DB::table('pengumuman')
        ->join('calon_siswa', 'calon_siswa.id', '=', 'pengumuman.calon_siswa_id')
        ->select('pengumuman.*', 'calon_siswa.nama_siswa','calon_siswa.email','calon_siswa.no_tlp')
        ->where('pengumuman.id')
        ->get();
    $data = array(
    
    'pengumuman' => $pengumuman
    );
    //dd($data);    
        return view('panitia.data_pengumuman.data_pesan',$data);
    }
    public function edit($id){
        $pengumuman = DB::table('pengumuman')
        ->join('calon_siswa', 'calon_siswa.id', '=', 'pengumuman.calon_siswa_id')
        ->select('pengumuman.*', 'calon_siswa.nama_siswa','calon_siswa.email','calon_siswa.no_tlp')
        ->where('pengumuman.id',$id)
        ->get();
            $data = array(
            'pengumuman' => $pengumuman,
            );
        //dd($pengumuman );
        return view('panitia.data_pengumuman.edit',$data); 
    }
    public function update($id,Request $request){

      //ambil data dulu sesuai parameter $Id
      $pn = Pengumuman::findOrFail($id);

      $pn->kode_pgn = $request->kode_pgn;
      //$pn->calon_siswa_id = $request->calon_siswa_id;
      $pn->judul_pengumuman = $request->judul_pengumuman;
      $pn->deskripsi = $request->deskripsi;
      $pn->status = $request->status;
      $pn->save();
    return redirect()->route('panitia.pengumuman')->with('success', 'Berhasil Mengubah Pengumuman');
    }
   
}
