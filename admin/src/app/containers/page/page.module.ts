import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { StoreModule } from "@app/context";
import { TableModule } from "@components/table";
import { PageTableComponent } from "@containers/page/page-table";
import { PageFormComponent } from '@containers/page/page-form';
import {ReactiveFormsModule} from "@angular/forms";
import {FormModule} from "@components/form";



@NgModule({
    declarations: [ PageTableComponent, PageFormComponent],
    exports: [
    ],
    imports: [
        CommonModule,
        StoreModule,
        TableModule,
        ReactiveFormsModule,
        FormModule
    ]
})
export class PageModule { }
