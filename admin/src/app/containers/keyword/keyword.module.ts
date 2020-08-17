import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { KeywordComponent } from './keyword.component';
import { StoreModule } from "@app/context";
import { TableModule } from "@components/table";
import { KeywordTableComponent } from "@containers/keyword/keyword-table";



@NgModule({
    declarations: [KeywordComponent, KeywordTableComponent],
    exports: [
        KeywordComponent
    ],
    imports: [
        CommonModule,
        StoreModule,
        TableModule
    ]
})
export class KeywordModule { }
