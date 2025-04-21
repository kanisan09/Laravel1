<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Member as MemberModel;
use Illuminate\Support\Collection;

class Member extends Component
{
    public string $name = '';  //publicじゃないとview側から操作できない
    public ?int $memberIdToDelete = null; //削除確認のダイアログを実装
    public ?int $editingMemberId = null; //編集中のメンバーのID
    public ?string $message = null;
    public ?string $error = null;
    public MemberModel $member;
    public Collection $members;

    public function render()  //render()　必ず実行されるメソッド
    {
        
        $this->members=$this->member->get();
        return view('livewire.member');
    }

    // mount 最初の１回必ず通るところ
    public function mount(MemberModel $member){   //Memberクラスのオブジェクトを入れるための変数$member
        $this->member=$member;
    }

    public function save(){

        $this->validate([
            'name' => 'required|max:255',
        ]);

        $this->member->create([
            "name"=>$this->name
        ]);

        $this->name = ''; //フォームをリセット
        $this->message = 'メンバーを追加しました！';
        $this->error = null;
    }

    public function deleteMember(int $id){
        $memberToDelete = MemberModel::find($id);
        if($memberToDelete){
            $deletedName = $memberToDelete->name; //削除する名前を取得
            $memberToDelete->delete();
            $this->members = $this->member->get(); //削除後にリストを再読み込み
            $this->message = '「'. $deletedName .'」を削除したぞ！！٩( ‘ω’ )و ';
            $this->error = null;
        } else {
            $this->error = '削除に失敗しました！ (；ω；)';
            $this->message = null;
        }
    }

    public function editMember(int $id){
        $this->editingMemberId = $id;
        $memberToEdit = MemberModel::find($id);
        if($memberToEdit){
                $this->name = $memberToEdit->name;  //編集フォームに名前をセット
            }
            
        }

    public function updateMember(){
        if($this->editingMemberId){
            $this->validate([
                'name' => 'required|max:255',
            ]);

            $memberToUpdate = MemberModel::find($this->editingMemberId);
            if($memberToUpdate){
                $memberToUpdate->update([
                    'name' => $this->name,
                ]);
                $this->resetEditForm();
                $this->message = '('. $memberToUpdate->name .')を編集しました！( ᐙ )';
                $this->error = null;
            }else{
                $this->error = '編集に失敗しました...(；ω；)';
                $this->message = null;
            }
        }
    }

    public function cancelEdit(){
        $this->resetEditForm();
    }

    public function resetEditForm(){
        $this->editingMemberId = null;
        $this-> name = '';
    }
}



