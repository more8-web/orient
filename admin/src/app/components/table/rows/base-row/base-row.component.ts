import {
    AfterViewInit,
    Component,
    ComponentFactoryResolver, ComponentRef,
    HostBinding,
    Input, OnDestroy, Type,
    ViewChild,
    ViewContainerRef
} from "@angular/core";
import { Columns } from "../../table.types";
import { BaseCellComponent } from "../../cells";

@Component({
    selector: "app-table-row",
    templateUrl: "./base-row.component.html",
    styleUrls: ["./base-row.component.css"]
})
export class BaseRowComponent implements AfterViewInit, OnDestroy {

    @Input() values: object;
    @Input() columns: Columns;

    @ViewChild("row", {read: ViewContainerRef}) row;
    @HostBinding("class") readonly classes = "row";



    constructor(private resolver: ComponentFactoryResolver) {
    }

    ngAfterViewInit(): void {
        let factory;
        this.columns.forEach(column => {
            factory = this.resolver.resolveComponentFactory(column.component as Type<any> || BaseCellComponent);
            const cell: ComponentRef<any> = this.row.createComponent(factory);

            cell.instance.classes = column.classes;
            cell.instance.value = this.values[column.field];

            cell.changeDetectorRef.detectChanges();
        });
    }

    ngOnDestroy(): void {
        this.row.clear();
    }
}
