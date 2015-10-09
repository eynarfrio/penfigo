
<?= $this->Form->create('Signo', ['action' => 'regis_sig_pac/'.$idPaciente.'/'.$numero]); ?>
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Signos Vitaless</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Signo</th>
                        <th style="width: 50%;">Valor</th>
                    </tr>
                    <?php foreach ($signos as $key => $sin): ?>
                      <tr>
                          <td><?= $sin['Signo']['nombre'] ?></td>
                          <td class="text-center">
                              <?= $this->Form->hidden("PacientesSigno.$key.id") ?>
                              <?= $this->Form->hidden("PacientesSigno.$key.paciente_id", ['value' => $idPaciente]) ?>
                              <?= $this->Form->hidden("PacientesSigno.$key.signo_id", ['value' => $sin['Signo']['id']]) ?>
                              <?= $this->Form->text("PacientesSigno.$key.valor", ['class' => 'form-control']) ?>
                          </td>
                      </tr>
                    <?php endforeach; ?>
                </thead>
            </table>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-outline">Registrar</button>
</div>
<?= $this->Form->end() ?>
