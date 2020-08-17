import { Component, EventEmitter, Input, OnInit, Output, Type } from "@angular/core";
import { Column, Columns, TableSchema } from "./table.types";
import { BaseCellComponent } from "@components/table/cells";

@Component({
    selector: "app-table",
    templateUrl: "./table.component.html",
    styleUrls: ["./table.component.css"]
})
export class TableComponent implements OnInit {
    @Input() schema: TableSchema;
    @Input() values: Array<object>;

    hasFooter: boolean = false;
    onRowClick: Function;

    constructor() {
    }

    ngOnInit(): void {
        this.onRowClick = this.schema.behaviours.onRowClick;
    }

    get hasHeader(): boolean {
        return this.schema.columns.some(column => !!column.label)
    };

    private _defaultComponent(type: "header" | "body" | "footer"): Type<any> | null {
        return this.schema?.defaultCellComponent instanceof Type
            ? this.schema?.defaultCellComponent
            : this.schema?.defaultCellComponent[type]
        ;
    }

    private _component(column: Column, type: "header" | "body" | "footer"): Type<any> {
        return (column.component && (column.component instanceof Type ? column?.component : column?.component[type]))
            || this._defaultComponent(type)
            || BaseCellComponent
        ;
    }

    private _columns(type: "header" | "body" | "footer"): Columns {
        return this.schema.columns.map(column => ({
            ...column,
            component: this._component(column, type)
        }));
    }

    get header(): { columns: Columns, values: object } {
        const columns = this._columns("header");
        const values = columns.reduce(
            (values, column) => ({
                ...values,
                [column.field]: column.label
            }), {}
        );

        return {columns, values};
    }

    get body(): { columns: Columns, values: Array<object> } {
        const columns = this._columns("body");
        const values = this.values;

        return {columns, values};
    }

    get footer(): { columns: Columns, values: object } {
        const columns = this._columns("body");
        const values = [];

        return {columns, values};
    }
}
