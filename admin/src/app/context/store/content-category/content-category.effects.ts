import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from "@ngrx/effects";
import { catchError, map, switchMap } from "rxjs/operators";
import { EMPTY } from "rxjs";

import { ContentCategoryApiService } from "src/app/api";
import * as actions from "./content-category.actions";

@Injectable()
export class ContentCategoryEffects {
    constructor(private actions$: Actions,
                private api: ContentCategoryApiService
    ) {
    }

    loadContentCategories$ = createEffect(
        () => this.actions$.pipe(ofType(actions.load), switchMap(() =>
                this.api.getContentCategories().pipe(
                    map(actions.loadSuccess),
                    catchError(() => EMPTY)
                )
            )
        )
    );

}
