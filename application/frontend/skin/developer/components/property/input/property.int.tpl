{include "components/field/field.text.tpl"
    name    = "property[{$property->getId()}]"
    value   = $property->getValue()->getValueForForm()
    classes = 'width-150'
    note    = $property->getDescription()
    label   = $property->getTitle()}