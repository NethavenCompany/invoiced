<?php
namespace nethaven\invoiced\models;

use craft\helpers\UrlHelper;

use nethaven\invoiced\records\InvoiceTemplate as TemplateRecord;

class InvoiceTemplate extends BaseTemplate
{
    // Properties
    // =========================================================================

    public ?string $html = null;
    public ?string $css = null;


    // Public Methods
    // =========================================================================

    /**
     * @inheritDoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();
        $rules[] = ['template', 'required'];

        return $rules;
    }

    public function getCpEditUrl(): string
    {
        return UrlHelper::cpUrl('invoiced/settings/invoice-templates/edit/' . $this->id);
    }

    public function getConfig(): array
    {
        return [
            'name' => $this->name,
            'handle' => $this->handle,
            'template' => $this->template,
            'sortOrder' => $this->sortOrder,
        ];
    }

    protected function getRecordClass(): string
    {
        return TemplateRecord::class;
    }
}
