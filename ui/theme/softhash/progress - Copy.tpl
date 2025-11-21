<div class="container">
	<div class="row bs-wizard" style="border-bottom:0;">
		{if {$progress}>1}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			<div class="col-xs-3 bs-wizard-step active">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 1</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Cust PR</div>
		</div>

		{if {$progress}==2}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			{if {$progress}>=3}
				<div class="col-xs-3 bs-wizard-step complete">
			{else}
				<div class="col-xs-3 bs-wizard-step disabled">
			{/if}
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 2</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">Drawing</div>
		</div>

		{if {$progress}==3}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			{if {$progress}>=4}
				<div class="col-xs-3 bs-wizard-step complete">
			{else}
				<div class="col-xs-3 bs-wizard-step disabled">
			{/if}
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 3</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Cust PR - Apv</div>
		</div>
		
		{if {$progress}==5}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			{if {$progress}>=6}
				<div class="col-xs-3 bs-wizard-step complete">
			{else}
				<div class="col-xs-3 bs-wizard-step disabled">
			{/if}
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 4</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">Supp PR</div>
		</div>

		{if {$progress}>=7}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 5</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Supp PR - Apv</div>
		</div>
		
		{if {$progress}==8}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			{if {$progress}>=9}
				<div class="col-xs-3 bs-wizard-step complete">
			{else}
				<div class="col-xs-3 bs-wizard-step disabled">
			{/if}
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 6</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">Supp QT</div>
		</div>

		{if {$progress}>=10}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 7</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Supp QT - Apv</div>
		</div>
		
		{if {$progress}==11}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			{if {$progress}>=12}
				<div class="col-xs-3 bs-wizard-step complete">
			{else}
				<div class="col-xs-3 bs-wizard-step disabled">
			{/if}
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 8</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">Cust QT</div>
		</div>

		{if {$progress}>=13}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 9</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Cust QT - Apv</div>
		</div>
		
		{if {$progress}==14}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			{if {$progress}>=15}
				<div class="col-xs-3 bs-wizard-step complete">
			{else}
				<div class="col-xs-3 bs-wizard-step disabled">
			{/if}
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 10</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">Cust PO</div>
		</div>

		{if {$progress}>=16}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 11</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Cust PO - Apv</div>
		</div>

		{if {$progress}==17}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			{if {$progress}>=18}
				<div class="col-xs-3 bs-wizard-step active">
			{else}
				<div class="col-xs-3 bs-wizard-step disabled">
			{/if}
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 12</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">Supp PO</div>
		</div>

		{if {$progress}>=19}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 13</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Label Int</div>
		</div>
		{if {$progress}==20}
			<div class="col-xs-3 bs-wizard-step active">
		{elseif {$progress}>=21}
			<div class="col-xs-3 bs-wizard-step complete">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 14</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">Label Int - Apv</div>
		</div>
		{if {$progress}>=28}
			<div class="col-xs-3 bs-wizard-step complete">
		{elseif {$progress}>=29}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 15</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">QC</div>
		</div>
		{if {$progress}>=30}
			<div class="col-xs-3 bs-wizard-step complete">
		{elseif {$progress}>=31}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 16</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info1 text-center">QC - Apv</div>
		</div>
		{if {$progress}>=32}
			<div class="col-xs-3 bs-wizard-step complete">
		{elseif {$progress}>=33}
			<div class="col-xs-3 bs-wizard-step active">
		{else}
			<div class="col-xs-3 bs-wizard-step disabled">
		{/if}
		  <div class="text-center bs-wizard-stepnum">Step 17</div>
		  <div class="progress"><div class="progress-bar"></div></div>
		  <a href="#" class="bs-wizard-dot"></a>
		  <div class="bs-wizard-info text-center">Label - Ext</div>
		</div>
	</div>
</div>