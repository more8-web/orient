import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { KeywordComponent } from './keyword.component';



@NgModule({
    declarations: [KeywordComponent],
    exports: [
        KeywordComponent
    ],
    imports: [
        CommonModule
    ]
})
export class KeywordModule { }
