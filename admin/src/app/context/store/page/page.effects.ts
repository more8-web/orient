import { Injectable } from "@angular/core";
import { Actions, createEffect, ofType } from "@ngrx/effects";
import { catchError, map, switchMap } from "rxjs/operators";
import { EMPTY } from "rxjs";

import { PageApiService } from "src/app/api";
import * as actions from "./page.actions";

@Injectable()
export class PageEffects {
    constructor(private actions$: Actions,
                private api: PageApiService
    ) {
    }

    loadContent$ = createEffect(
        () => this.actions$.pipe(ofType(actions.load), switchMap(() =>
                this.api.getPages().pipe(
                    map(actions.loadSuccess),
                    catchError(() => EMPTY)
                )
            )
        )
    );

}
