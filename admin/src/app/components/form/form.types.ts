import { Type } from "@angular/core";

export interface FormSchema {
    fields: Fields,
}

export type Fields = Field[];

export interface Field {
    classes: string | string[],
    label?: string,
    property?: string,
    component?: Type<any>,
}
