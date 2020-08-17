import { NgModule } from "@angular/core";
import { CommonModule } from "@angular/common";
import { ReactiveFormsModule } from "@angular/forms";
import { FormsModule } from "@angular/forms";

import { InputComponent } from "./input";
import { SelectComponent } from "./select";
import { TextareaComponent } from "./textarea";
import { RadioComponent } from "./radio";
import { CheckboxComponent } from "./checkbox";
import { FormComponent } from './form.component';
import { ButtonComponent } from './button/button.component';

@NgModule({
    declarations: [
        InputComponent,
        SelectComponent,
        TextareaComponent,
        RadioComponent,
        CheckboxComponent,
        FormComponent,
        ButtonComponent,
    ],
    imports: [
        CommonModule,
        ReactiveFormsModule,
        FormsModule
    ],
    exports: [
        FormComponent,
        InputComponent,
        TextareaComponent
    ]
})
export class FormModule {
}
