{include file="sections/header.tpl"}
{if $msg neq ''}
<div class="alert alert-success fade in">
	<button class="close" data-dismiss="alert">
		×
	</button>
	<i class="fa-fw fa fa-check"></i>
	{$msg}
</div>
{/if}
<div class="section" id="section1">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="background-color: #ccc;">
                    <input style="display: none;" type="text" id="kode" class="form-control" value="{$d['kode_form']}"/>
                    <h3 style="text-align: center;"><b>{$d['kode_form']} - {$d['nama_form']}</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <div class="alert alert-danger emsg" id="emsg1">
            <a href="#"><i class="fal fa-times" style="float:right" id="closeMsg1"></i></a>
            <span id="emsgbody1"></span>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <pre style="all:unset; white-space: pre-wrap;">{$d['deskripsi']}</pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body form-zoom" style="margin: 0;">
                {assign var="current" value=1}
                {foreach $e as $item}
                {if $item['section'] eq $current+1}
                {assign var="current" value=$current+1}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="section" id="section{$current}">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body" style="background-color: #ccc;">
                    <h3 style="text-align: center;"><b>{$item['pertanyaan']}</b></h3>
                </div>
            </div>
        </div>
        <div class="col-md-12">
        <div class="alert alert-danger emsg" id="emsg{$current}">
            <a href="#"><i class="fal fa-times" style="float:right" id="closeMsg{$current}"></i></a>
            <span id="emsgbody{$current}"></span>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <pre style="all:unset; white-space: pre-wrap;">{$item['deskripsi']}</pre>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body form-zoom" style="margin: 0;">
                
                {else}
                    
                    <div class="form-group">
                        <label class="control-label label-pertanyaan" for="jawaban">{$item['pertanyaan']}</label><br>
                        <pre style="all:unset; white-space: pre-wrap;">{$item['deskripsi']}</pre>
                        <td style="vertical-align: middle;"><input type="checkbox" name="chk{$current}[]" class="cekbox" checked="checked" style="display:none"></td>
                        <input style="display: none;" type="text" id="section" name="section[]" class="form-control" value="{$item['section']}"/>
                        {if $item['tipe'] eq 'string'}
                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$item['tipe']}"/>
                        <input type="text" id="{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" class="form-control"/>
                        {else if $item['tipe'] eq 'datetime'}
                        <!-- <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$item['tipe']}"/>
                        <input type="datetime-local" id="{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" class="form-control" /> -->

                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$item['tipe']}"/>
                        <div class="row">
                            <div class="col-lg-3">
                                <input type="date" id="{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" class="form-control " style="border: 1px solid #aaa; background-color: #fff"/>
                            </div>
                            <div class="col-lg-3">
                                <select id="s{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" class="jawaban" style="margin-left: 15px">
                                    <option value="">Pilih Waktu</option>
                                    {$waktu}
                                  </select>
                            </div>
                        </div>
                        <!-- <input type="date" id="{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" class="form-control"/>
                        <select class="jawaban" name="jawaban{$item['section']}[]" id="{$item['section']|replace:'.':''}">
                            <option value="">Pilih Waktu</option>
                            {$waktu}
                        </select> -->
                        {else if $item['tipe'] eq 'date'}
                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$item['tipe']}"/>
                        <div class="row">
                            <div class="col-lg-3">
                                <input type="date" id="{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" class="form-control " style="border: 1px solid #aaa; background-color: #fff"/>
                            </div>
                            </div>
                        {else if $item['tipe'] eq 'statement'}
                       
                        {else if $item['tipe'] eq 'time'}
                        <!-- <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$item['tipe']}"/>
                       
                        <input type="time" id="{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" class="form-control"/> -->
                        
                        <select class="jawaban" name="jawaban{$item['section']}[]" id="{$item['section']|replace:'.':''}">
                            <option value="">Pilih Waktu</option>
                            {$waktu}
                        </select>
                        {else if $item['tipe'] eq 'file'}
                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$item['tipe']}"/>
                        <input type="file" id="s{$item['section']|replace:'.':''}" name="sjawaban{$item['section']}[]" class="files form-control"/>
                        <input type="text" id="{$item['section']|replace:'.':''}" name="jawaban{$item['section']}[]" style="display: none;">
                        {else if $item['tipe'] eq '14harikerja'}
                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$item['tipe']}"/>
                        {else}
                            {foreach $tg as $items}
                                {if $items['kode'] eq $item['tipe']}
                                    {if $items['tipe'] eq 'dropdown'}
                                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$items['tipe']}"/>
                                        <select class="jawaban" name="jawaban{$item['section']}[]" id="{$item['section']|replace:'.':''}">
                                            <option value="">Pilih</option>
                                            {assign var=pilihan value=","|explode:$items['value']}
                                            {foreach $pilihan as $pilih}
                                            <option value="{$pilih}">{$pilih}</option>
                                            {/foreach}
                                        </select>
                                    {else if $items['tipe'] eq 'checkbox'}
                                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$items['tipe']}"/>
                                        {assign var=pilihan value=","|explode:$items['value']}
                                        <br>
                                        {foreach $pilihan as $pilih}
                                        <input id="{$item['section']|replace:'.':''}" type="checkbox" name="jawaban{$item['section']|replace:'.':''}[]" value="{$pilih}"><label style="font-weight: normal"> {$pilih}</label><br>
                                        {/foreach}
                                    {else if $items['tipe'] eq 'radiobutton'}
                                        <input style="display: none;" type="text" id="tipe{$item['section']|replace:'.':''}" name="tipe[]" class="form-control" value="{$items['tipe']}"/>
                                        {assign var=pilihan value=","|explode:$items['value']}
                                        <br>
                                        {foreach $pilihan as $pilih}
                                        <input id="{$item['section']|replace:'.':''}" type="radio" name="jawaban{$item['section']|replace:'.':''}[]" value="{$pilih}"><label style="font-weight: normal"> {$pilih}</label><br>
                                        {/foreach}
                                    {/if}
                                {/if}
                            {/foreach}
                        {/if}
                    </div>
                {/if}
                {/foreach}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <button class="btn btn-primary" type="button" id="prev">Prev</button>
                <button class="btn btn-primary" type="button" id="next">Next</button>
                <button class="btn btn-danger" type="submit" id="save">Submit</button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
       {$paginator['contents']}
    </div>
</div>
{include file="sections/footer.tpl"}