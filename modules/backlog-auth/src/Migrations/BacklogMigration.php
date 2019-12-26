<?php
namespace Chatbox\BacklogApp\Migrations;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BacklogMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->getDeflist() as list($tableName,$tableDef)) {
            Schema::create("blg_{$tableName}",$tableDef);
        }
    }

    public function down(){
        foreach ($this->getDeflist() as list($tableName,$tableDef)) {
            Schema::dropIfExists("blg_{$tableName}");
        }
    }

    public function getDeflist(){
        return [
            $this->defSpace(),
            $this->defUser(),
            $this->defProject(),
            $this->defIssue(),
        ];
    }

    protected function defSpace(){
        return [ "space",function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('space_key')->unique();
            $table->string('domain')->unique();
            $table->string('owner_id');
            $table->string('name');
            $table->string('lang');
            $table->longText('payload');
            $table->timestamps();
        }];
    }

    protected function defUser(){
        return [ "user",function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blg_id');
            $table->string('user_id');
            $table->string('name');
            $table->string('role_type');
            $table->string('lang');
            $table->string('email');
            $table->longText('payload');
            $table->timestamps();
        }];
    }

    protected function defUserToken(){
        return [ "user_token",function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('access_token');
            $table->string('refresh_token');
            $table->dateTime("expired_at")->nullable();
            $table->timestamps();
        }];
    }

    protected function defProject(){
        return [ "project",function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blg_id');
            $table->string('project_key');
            $table->string('name');
            $table->string('archived');
            $table->longText('payload');
            $table->timestamps();
        }];
    }

    protected function defIssue(){
        return [ "issue",function(Blueprint $table){
            $table->bigIncrements('id');
            $table->unsignedBigInteger('blg_id');
            $table->string('project_id');
            $table->string('isseu_key');
            $table->string('key_id');
            $table->string('issue_type_name');
            $table->string('summary');
            $table->longText('description');
            $table->string('status_name');
            $table->string('assignee_id');
            $table->string('assignee_name');
            $table->longText('payload');
            $table->timestamps();
        }];
    }
}
