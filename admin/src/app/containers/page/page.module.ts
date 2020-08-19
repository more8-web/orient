import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';

import { StoreModule } from "@app/context";
import { TableModule } from "@components/table";
import { PageTableComponent } from "@containers/page/page-table";
import { UpdatePageFormComponent } from '@containers/page/update-page-form';
import {ReactiveFormsModule} from "@angular/forms";
import {FormModule} from "@components/form";



@NgModule({
    declarations: [ PageTableComponent, UpdatePageFormComponent],
    exports: [
        PageTableComponent
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
