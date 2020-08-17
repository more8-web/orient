import { Type } from "@angular/core";

export interface TableSchema {
    defaultCellComponent?: Type<any> | {
        header?: Type<any>,
        body?: Type<any>,
        footer?: Type<any>,
    };
    behaviours?: {
        onRowClick?: Function,
    };
    columns: Columns;
}

export type Columns = Column[];

export interface Column {
    classes: string | string[];
    label?: string;
    field?: string;
    component?: Type<any> | {
        header?: Type<any>,
        body?: Type<any>,
        footer?: Type<any>,
    };
}
